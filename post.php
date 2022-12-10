<?php 

    if(isset($_GET['article_id']) and 
        $_GET['article_id'] != null 
        // gettype($_GET['article_id']) === 'integer'
        ) {
        include_once 'api/database.php';
        $db = new Database();
        $post = $db->getPost($_GET['article_id']);

        if(!$post){
            die('Pas de post');
        }

        $user = $db->getUser($post['id_users']);
    } else {
        var_dump($_GET['article_id']);
        die('Erreur');
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?php echo $post['summary']; ?>" />
        <meta name="author" content="letecode" />

        <title><?php echo $post['title']; ?> - Letecode Blog</title>

        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php include('includes/navigation.php'); ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo $post['cover']; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $post['title']; ?></h1>
                            <h2 class="subheading"><?php echo $post['summary']; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $user['name']; ?></a>
                                on <?php echo $post['created_at']; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?php echo nl2br(htmlspecialchars($post['content'])) ?>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <?php include('includes/footer.php'); ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
