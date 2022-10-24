<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css" >
</head>
<body>
    <div class="wrapper">
            <div class="error">
                <?php 
                if($inputErr == 'notfound' || $inputErr=='Not Found'){
                    echo 'User not found!'; 
                }elseif(preg_match('/^API rate limit exceeded/',$inputErr)){
                    echo 'API request limit exceeded!'; 
                }elseif($inputErr){
                    echo $inputErr;
                }
                ?>
            </div>
        <form action="index.php" method="POST">
            <input type="text" name='username' placeholder="Search username..">
            <button type="submit" name="submit">Search</button>
        </form> 
        <?php if($username): ?>
            
            <div class="choice">
                <div class="username">
                    <?php echo $username ?>:
                </div>
                <a href=<?php echo "details.php?username=$username&show=followers";?>>
                    <button>Followers</button>
                </a>
                <a href=<?php echo "details.php?username=$username&show=repos";?>>
                    <button>Repositories</button>
                </a>
            </div>
        <?php endif; ?>