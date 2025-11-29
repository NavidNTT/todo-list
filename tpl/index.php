<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Task manager UI</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
     
    </style>

  </head>
    
  <body>
  <div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <a href="<?= site_url("?logout=1") ?>"><i class="fa fa-sign-out"></i></a>
    <div class="userPanel">
    <span class="username"> <?= $user-> name ?? 'unknown' ?> </span>
    <img src="<?= $user->image ?>" width="40" height="40"/>
  </div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">my folder</div>
        <ul class="folder_down">
          <li class="<?= isset($_GET['folder_id']) ? '' : 'active' ?>"> 
          <a href="<?= site_url() ?>"><i class="fa fa-folder"></i>ALL FOLDER</a>
        </li>
          <?php foreach($folder as $folder): ?>
            <li>
            <a href="<?= site_url("?folder_id= $folder->id") ?>"><i class="fa fa-folder"></i><?= $folder->name ?></a>
            <a href="?delete_folder=<?= $folder->id ?>"><i class="remove">x</a>
          </li>
          <?php endforeach; ?>
        </ul>
        <div>
          <input type="test" id="newfolderinput" style="width: 100px; margin-left: 3px" placeholder="Add new folder"/>
          <button id="newfolderbtn" class="btn clickable" >submit</button>
        </div>
      </div>
    </div>
    <div class="view">
             <div class="viewHeader">
    <div class="title"></div> 
    <div class="functions">
                  <input type="test" id="newtaskinput" style="width: 100px; margin-left: 3px" placeholder="Add new task"/>
    </div>
            </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>

            <?php foreach($tasks as $task): ?>
            <li class="<?= $task->is_done ? 'checked' : '' ; ?>">
              <i data_taskid="<?= $task->done?>" class="is-done clickable fa <?= $task->done ? ' fa-check-square-o' : ' fa-square-o' ; ?>"></i>
              <span><?= $task->title?></span>
              <div class="info">
                <span class='created-at'>created by <?= $task->created_at?></span>
                <a href="?delete_task=<?= $task->id ?>"><i class="remove" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS\n<?= $task->title ?>');">x</a>
              </div>
            </li>
            <?php endforeach; ?>

          </ul>
        </div>
          <ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="assets/js/script.js"></script>

      <script>
        $(document).ready(function(){



          $('.is-done').click(function(e){
            var tid = $(this).attr('data_taskid');
          $.ajax({
              url:"process/ajaxhandler.php",
              method: "post",
              data:{action: "donetask",
                 taskId : tid},
            success : function(response){
            console .log(response);
            location.reload();
            }
          })
          });




          $('#newfolderbtn').click(function(e){
            var input = $('input#newfolderinput');
          $.ajax({
            type: "post",
            url:"process/ajaxhandler.php",
            data:{action: "addfolder", foldername:input.val()},
            success : function(response){
            if(response = '1' ){
            $('<li><li> <a href="#"><i class="fa fa-folder"></i>'+input.val()+'</a></li>').appendTo('ul.folder_down');
            }else{
               alert(response);
            }
            }
          })

          });

          $('#newtaskinput').on('keypress',function(e) {
    if(e.which == 13) {
            $.ajax({
              url:"process/ajaxhandler.php",
              method: "post",
              data:{action: "addtask",folderid : <?= $_GET['folder_id'] ?>, tasktitle: $('#newtaskinput').val()},
            success : function(response){
            if(response = '1' ){
            location.reload()
            }else{
              alert(response);
            }
            }
          })
    }
});
        });

        
      </script>
  </body>
  
</html>
