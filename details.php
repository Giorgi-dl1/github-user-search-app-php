<?php
$inputErr ='';
$data = [];
$message = '';

include 'includes/functions.inc.php';
if(empty($_GET['username'])){
    header('location: index.php');
    exit();
}
$username = htmlspecialchars($_GET['username']);


if(empty($_GET['show'])){
    header('location: index.php');
    exit();
}

if($_GET['show'] == 'followers'){
    $response = getFollowers($username);
    $username = htmlspecialchars($_GET['username']);
    if(count($response)>=1){
        $data = $response;
    }elseif(count($response)==0){
        $message = 'No followers found!';
    }else{
        header("location: index.php?error=" . $response['message']);
        exit();
    }

}elseif($_GET['show'] == 'repos'){
    $response = getRepos($username);
    $username = htmlspecialchars($_GET['username']);
    if(count($response)>=1){
        $data = $response;
    }elseif(count($response)==0){
        $message = 'No repositories found!';
    }else{
        header("location: index.php?error=" . $response['message']);
        exit();
    }

}else{
    header('location: index.php');
    exit();
}
?>
<?php include 'header.php' ?>
<div class="username" style="text-align: center; margin-top:1rem;">
<?php echo $_GET['show']?>
</div>
<div class="list">
    <?php if($_GET['show']==='followers'): ?>
        <?php if(count($data)>=1): ?>
            <?php foreach($data as $item): ?>
                <a class="follower-component" href="<?php echo $item['html_url']; ?>" target="_blank">
                        <img src="<?php echo $item['avatar_url'] ?>" alt="">
                        <p class="name"><?php echo $item['login']?></p>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
                <?php echo $message; ?>
        <?php endif ?>
    <?php else: ?>
        <?php if(count($data)>=1): ?>
            <?php foreach($data as $item): ?>

                <a class="repo-component" href="<?php echo $item['html_url']; ?>" target="_blank">
                <?php echo $item['name'] ?>
                </a>
            <?php endforeach; ?>
            <?php else: ?>
                <?php echo $message; ?>
            <?php endif ?>
    <?php endif; ?>

    
</div>
<?php include 'footer.php'?>