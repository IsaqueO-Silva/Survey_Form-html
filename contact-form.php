<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="css/contact-form.css" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Contact</title>
    <style>
        .error{ color: red; }
    </style>
</head>

<body>
    <?php 
        $nameError = $emailError = $subjectError = "";
        $name = $email = $subject = $feedback = "";
        //Teste caso os campos do formulário estejam vazias
        if(empty($_POST['name'])){
            $nameError = 'Name required!';
        }else if(preg_match("/^[a-zA-Z ]+$/", $_POST['name'])!=1){//O campo nome só pode ter letras e espaço em branco
            $nameError = "Only letters and space allowed!";
        }else{
            $name = sanitize($_POST['name']);
        }

        if(empty($_POST['email'])){
            $emailError = 'Email required!';
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $emailError =  "Invalid email format!";
        }else{
            $email = sanitize($_POST['email']);
        }

        if(empty($_POST['subject'])){
            $subjectError = "Subject required!";
        }else if(!preg_match("/^[a-zA-z 0-9'']+$/", $_POST['subject'])){
            $subjectError = "Invalid subject format!";
        }else{
            $subject = sanitize($_POST['subject']);
        }
        /*Essa função limpa os dados enviados pelo form*/
        function sanitize($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <p>Contact us</hp>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name"
                                     maxlength="255" value="<?php echo $name;?>">
                                    <span class="error"><?php echo $nameError?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email" 
                                     maxlength="255" value="<?php echo $email;?>">
                                     <span class="error"><?php echo $emailError?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                                    maxlength="50" value="<?php echo $subject;?>">
                                    <span class="error"><?php echo $subjectError?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="feedback">Feedback</label>
                                    <textarea class="form-control" rows="3" id="feedback" name="feedback" placeholder="Feedback" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" id="btnContact">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>