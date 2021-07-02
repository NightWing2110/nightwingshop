<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php" ?>
<script type="text/javascript">
          document.title = 'Liên Hệ | VinaEnter Edu';
      </script>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Contact</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2>Our Office</h2>
                    <h3><i class="fa fa-map-marker"></i>123 Office, Los Angeles, CA, USA</h3>
                    <h3><i class="fa fa-envelope"></i>office@example.com</h3>
                    <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2>Our Store</h2>
                    <h3><i class="fa fa-map-marker"></i>123 Store, Los Angeles, CA, USA</h3>
                    <h3><i class="fa fa-envelope"></i>store@example.com</h3>
                    <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form">
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $content = $_POST['content'];
                        $queryContact = "INSERT INTO `contact`(name,email,subject,content) VALUES ('{$name}','{$email}','{$subject}','{$content}')";
                        $resultContact = $mysqli->query($queryContact);
                        if ($resultContact) {
                            header('location:index.php?msg= Thêm liên lạc thành công');
                          } else {
                            echo "Lỗi! Không thể thêm liên lạc";
                          }
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required />
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" name="content" placeholder="Message" required></textarea>
                        </div>
                        <div><button class="btn" type="submit" name="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>