<div class="navbar navbar-default" role="navigation">
    <?php echo $this->element('/admin/header'); ?>
</div>

<div class="sidebar-nav">
    <?php echo $this->element('/admin/sidebar'); ?>
</div>

 

<div class="content">
    <div class="header">

        <h1 class="page-title">User Tree View</h1>
        <ul class="breadcrumb">
            <li><a href="<?php //echo $this->Html->url(array('controller' => 'Newsletters', 'action' => 'admin_index')); ?>">User Tree View</a> </li>
            <li class="active">User Tree View</li>
        </ul>
<!--<div class="btn-toolbar list-toolbar">
            <a href="<?php //echo $this->Html->url(array('controller' => 'Users', 'action' => 'admin_add')); ?>"><span class="btn btn-primary"><i class="fa fa-plus"></i>New Add</span></a>
            <?php //echo $this->Form->create("User", array("action" => "admin_tree_search")); ?>
            <div class="search_username">
                <button type="submit" class="search_button1" style="float: right;"><i class="fa fa-search"></i></button>
                <input type="text" name="keyword" value="<?php if (@$keyword) {
                //echo $keyword;
            } ?>" placeholder="Search Your Username" class="form-control" style="width: 17%;float: right;"/>
            </div>
            </form>
            <div class="btn-group">
            </div>
        </div>
    </div>-->
    
    <div class="main-content">
                <?php $x= $this->Session->flash(); 
                if($x)
                {
                    echo $x;
                }
                ?>
       
                <style>
                    
                    .pedigree_node {
                       // border: 1px solid #99BBE8;
                        background-color: #fff;
                    }
                    .tree_vertical_line {
                        background-image: url(images/tree_line.gif);
                        background-repeat: repeat-y;
                        background-position: center top;
                    }
                    .tree_horizontal_line {
                        background-image: url(images/tree_line.gif);
                        background-repeat: repeat-x;
                        background-position: left top;
                    }
                    .tree_horizontal_line_valign_middle {
                        background-image: url(images/tree_line_2px.gif);
                        background-repeat: repeat-x;
                        background-position:left center}
                    .tree_right_line {
                        border-right-width: 1px;
                        border-right-style: solid;
                        border-right-color: #C6C6C6;
                    }
                    .tree_left_top_line {
                        border-top-width: 1px;
                        border-top-style: solid;
                        border-top-color: #C6C6C6;
                        border-left-width: 1px;
                        border-left-style: solid;
                        border-left-color: #C6C6C6;
                    }
                    .tree_right_top_line {
                        border-top-width: 1px;
                        border-top-style: solid;
                        border-top-color: #C6C6C6;
                        border-right-width: 1px;
                        border-right-style: solid;
                        border-right-color: #C6C6C6;
                    }
                </style>
                    <div class='tree_con'>
                    <table width='100%' border='0' align='center' cellpadding='0' cellspacing='5'>
                        <tr>
                            <?php
                                echo $this->Utilitymethods->createBinaryTreeAdmin($tree,"User",$this->Html->url('/admin/users/user_tree'),"username","email","fname");
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .user_tree {
    background: none repeat scroll 0 0 #fff;
    float: left;
    margin-bottom: 19px;
    padding: 10px;
    position: relative;
    width: 100%;
}
.tree_con
{
    width:100%;
    overflow:auto;
    
}
.tree_con table tr td
{    
padding: 0 2px 0 0px;
    
}
.pedigree_node td strong{
    font-family:"robotoregular";
    font-weight: normal;
    font-size: 12px;
    color: #787878;
}

.pedigree_node td strong:hover{
    color: #00b3ff;
}

.pedigree_node span {
    float: left;
    width: 100%;
}
.pedigree_node span i {
    border: 1px solid #00b3ff;
    border-radius: 50%;
    color: #00b3ff;
    font-size: 24px;
    height: 37px;
    padding: 5px 0;
    width: 40px;
}
.tree_vertical_line
{
    text-align: center;
    color: #c6c6c6;
    
}
</style>

<script type="text/javascript">
$('.pedigree_node tbody tr td').on("click",function(e){
e.preventDefault();
var a=$(this).data("email");
$('#semail').val(a);
$('#myModal_asdf').modal('show');
});
</script>
<div id="myModal_asdf" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Contact Us</h4>
            </div>
            <form action="/users/sendus" name="frm" method="post">
            <div class="modal-body">
                E-mail: <p><input type="text" class="form-control" id="semail" value="" name="email" /></p>
                Subject: <p><input type="text" class="form-control"  value="" name="sub" /></p>
                <input type="hidden"   value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="url" />
                Message: <p><textarea name="msg" class="form-control" ></textarea></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="sbt" value="Send"/>
                
            </div>
            </form>
        </div>
    </div>
</div>