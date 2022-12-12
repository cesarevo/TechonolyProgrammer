<form class = "vid">
    <?php
        if (!isset($_SESSION)) {session_start();}
        //$player = "<?php echo $_SESSION['email'];
        $eml = $_SESSION['email'];
    ?>         
     <h1>Добавить видео</h1>
     
            <h5>По ссылке</h5>
            <input type="text" placeholder="Link" name = "video-link">
            <button onclick="readUrl()">Save </button>
            
            <h5>Загрузить с ПК</h5>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file"  accept="video/*" onchange="upfile(this)">	           
            </form>
            <iframe src="<?php if (isset($_SESSION['link'])) $_SESSION['link'];?>" frameborder="0"></iframe>
            <iframe src="https://www.youtube.com/embed/07SAHCK0Urk"></iframe>
            
</form>