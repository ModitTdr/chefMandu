<h2 align="center">Reviews</h2>
<?php
    include_once("../login/php/connection.php");
    session_start();
    $rid = $_POST['rid'];
    $query="SELECT users.username, comId,date,comment FROM cmt JOIN users on cmt.uid = users.id WHERE rid=$rid ORDER BY date DESC;";
    $exec = mysqli_query($conn,$query);
    if(mysqli_num_rows($exec) > 0){
        while($row=mysqli_fetch_assoc($exec)){
            
?>
<div class="sections">   
    <div class="top">
        <div class="uname"><?php echo $row['username']; ?></div>
        <div class="dates"><?php echo $row['date']; ?> </div>
    </div>

    <div class="main-body">
        <div class="cmt"><?php echo $row['comment']; ?></div>
        <?php if(!empty($_SESSION)){
            if($row['username']==$_SESSION['Username']){ 
        ?>
            <a class="del" title="Delete your comment"><i class="fa-solid fa-trash"></i></a>
            <input type="hidden" id="comid" value="<?php echo $row['comId']?>" >
        <?php }}?>
    </div>
</div>
<?php }
    }else{?>
    <div class="main-body">
        <div class="cmt" align="center">No comments found</div>
    </div>
<?php }?>

<script>
    $(".del").on("click",function(e){
        var commentId = $("#comid").val();
        $.ajax({
            url:"../../crud(php)/comment-del.php",
            type:"POST",
            data:{comId : commentId},
            success:function(data){
                if (data == 1) {
                    alert("Deleted");
                    window.location.reload();
                } else {
                   alert("failed");
                }
            }
        });
      });
</script>