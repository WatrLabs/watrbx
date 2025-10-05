<?php

namespace watrbx;

// took me almost an hour to make this bruh

class gamealgorithm {
    
    public static function calculate_score($universeid){
        global $db;
        
        $now = time();
        $sevendaysago = $now - (7 * 24 * 60 * 60);
        $thirtydays = $now - (30 * 24 * 60 * 60);
        
        $recentvisits = $db->table("visits")
            ->where("universeid", $universeid)
            ->where("time", ">", $sevendaysago)
            ->count();
        
        $totalvisits = $db->table("visits")
            ->where("universeid", $universeid)
            ->count();
        
        $upvotes = $db->table("likes")
            ->where("assetid", $universeid)
            ->where("vote", 1)
            ->count();
        
        $downvotes = $db->table("likes")
            ->where("assetid", $universeid)
            ->where("vote", 0)
            ->count();
        
        $totalvotes = $upvotes + $downvotes;
        $likeratio = $totalvotes > 0 ? ($upvotes / $totalvotes) : 0.5;
        
        $activeplayers = $db->table("activeplayers")
            ->where("placeid", $universeid)
            ->count();
        
        $assetinfo = $db->table("assets")->where("id", $universeid)->first();
        if(!$assetinfo){
            return 0;
        }
        
        $age = $now - $assetinfo->created;
        $agepenalty = min(1, $age / (30 * 24 * 60 * 60));
        
        $score = ($recentvisits * 10) + 
                 ($totalvisits * 2) + 
                 ($likeratio * 100) + 
                 ($activeplayers * 50) - 
                 ($agepenalty * 20);
        
        return max(0, $score);
    }
    
    public static function update_all_scores(){
        global $db;
        
        $alluniverses = $db->table("universes")->where("public", 1)->get();
        
        foreach($alluniverses as $universe){
            $score = self::calculate_score($universe->assetid);
            
            $existing = $db->table("game_recommendations")
                ->where("universeid", $universe->assetid)
                ->first();
            
            if($existing){
                $db->table("game_recommendations")
                    ->where("universeid", $universe->assetid)
                    ->update([
                        "score"=>$score,
                        "last_updated"=>time()
                    ]);
            } else {
                $db->table("game_recommendations")->insert([
                    "universeid"=>$universe->assetid,
                    "score"=>$score,
                    "last_updated"=>time()
                ]);
            }
        }
    }
}