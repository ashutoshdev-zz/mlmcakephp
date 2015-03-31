<?php
App::uses('Shell', 'Console');
class MainShell extends AppShell{
    public function main() {
        parent::main();
        /*$this->loadModel('Department');
        $x = $this->Department->find("all");
        foreach($x as $ot){
            $this->out($ot['Department']['department_name']);
        }*/
        
        
        
            $this->loadModel('Video');
            $this->loadModel('Forum');
            $this->loadModel('Post');
            $this->loadModel('Advertisement');
            $today = date('Y-m-d');
            $oneWeekAgo = strtotime ( '-1 week' , strtotime ( $today ) ) ; 
            $date= date ( 'Y-m-j' , $oneWeekAgo );
            $video_lists = $this->Video->query("SELECT * FROM  `videos` WHERE  `modified` <'$date' ");
            foreach($video_lists as $video_list){
                $vi_id=$video_list['videos']['id'];
                $this->Video->query("UPDATE `videos` set `status`='0' WHERE  `id`='$vi_id'");
            }
            $post_lists = $this->Post->query("SELECT * FROM  `posts` WHERE  `modified` <'$date' ");
            foreach($post_lists as $post_list){
                $ps_id=$post_list['posts']['id'];
                $this->Post->query("UPDATE `posts` set `status`='0' WHERE  `id`='$ps_id'");
            }
            $forum_lists = $this->Forum->query("SELECT * FROM  `forums` WHERE  `modified` <'$date' ");
            foreach($forum_lists as $forum_list){
                $fr_id=$forum_list['forums']['id'];
                $this->Forum->query("UPDATE `forums` set `status`='0' WHERE  `id`='$fr_id'");
            }
            $today1 = date('Y-m-d');
            $oneWeekAgo1 = strtotime ( '-15 days' , strtotime ( $today1 ) ) ; 
            $date1= date ( 'Y-m-j' , $oneWeekAgo1 );
            $advertisements1=$this->Advertisement->find('all',array('conditions'=>array('AND'=>array('Advertisement.modified < '=>$date1,
                'Advertisement.addtype'=>'2'))));
            foreach($advertisements1 as $advertisement1){
                $this->Advertisement->id=$advertisement1['Advertisement']['id'];
                $this->Advertisement->save(array('Advertisement' => array('status' => 0)));
            }
            
            $today2 = date('Y-m-d');
            $oneWeekAgo2 = strtotime ( '-30 days' , strtotime ( $today2 ) ) ; 
            $date2= date ( 'Y-m-j' , $oneWeekAgo2 );
            $advertisements2=$this->Advertisement->find('all',array('conditions'=>array('AND'=>array('Advertisement.modified < '=>$date2,
                'Advertisement.addtype'=>'1'))));
            foreach($advertisements2 as $advertisement2){
                $this->Advertisement->id=$advertisement2['Advertisement']['id'];
                $this->Advertisement->save(array('Advertisement' => array('status' => 0)));
            }
        $this->out("Hello");
        file_put_contents("files/tdt.txt", date("c"));

    }
}
?>
