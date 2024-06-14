<x-plasticUserLayout><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <style>
       .main{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;


        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-pic-container {
            flex-shrink: 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #2dc997;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ccc;
            margin-right: 20px;
        }
        .profile-icon {
            font-size: 50px;
            color: white;
        }
        .profile-info .name {
            color: #2dc997;
            margin: 0;
        }
        .profile-info p {
            margin: 0;
            color: #555;
        }
        .about-me {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .about-me h3 {
            margin-top: 0;
        }
        .edit-button {
            background-color: #2dc997;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-button:hover {
            background-color: #16bc0a;
        }
    </style>
</head>

    <main id="main" class="container">
        <section id="ppprofile">
            <div class="header">
                <a class="navbar-brand" href="/">
                    <i class="bi bi-house"></i> Home
                </a>
                <button class="edit-button">Edit Profile</button>
            </div>
            <div class="profile">
                <div class="profile-pic-container">
                    <i class="bi bi-person profile-icon"></i>
                </div>
                <div class="profile-info">
                    <h2 class="name">Charlene Mbugua</h2>
                    <p class="location"><i class="fas fa-map-marker-alt"></i>Nationality: Kenya</p>
                    <p class="email"><i class="fas fa-envelope"></i>Email: charlenenjambi@gmail.com</p>
                    <p class="gender"><i class="fas fa-venus"></i>Gender: Female</p>
                </div>
            </div>
            <div class="about-me">
                <h3>About Me</h3>
                <p>This is where the user can write something about themselves.</p>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</html>
</x-plasticUserLayout>
