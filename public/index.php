<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, show the "Get Started" button
    $buttonText = "Get Started";
    $buttonLink = "login.php"; // Redirect to login
} else {
    // If logged in, show the user's name and a "Go to Dashboard" button
    $buttonText = "Go to Dashboard";
    $buttonLink = "dashboard.php"; // Redirect to dashboard
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Evolve - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('assets/images/gym-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        header {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
        }

        header .logo img {
            max-width: 200px;
            height: auto;
            filter: drop-shadow(0 0 10px rgb(111, 0, 255));
            animation: logo-bounce 2s infinite;
        }

        @keyframes logo-bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-2px);
            }
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li {
    margin-left: 55px; 
    font-size: large;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}




body {
    margin: 0;
    padding: 0;
}


.home-button{
    display: inline-block;
    color: #fff;
    text-decoration: none;
    text-align: center;
    position: relative;
    transition: color 0.3s;
   
}
.home-button:hover {
    
    border-style: solid;
  border-color: #03e9f4;
  -webkit-text-fill-color:rgb(255, 255, 255);
  background: #03e9f4;
    color: #050801;
    box-shadow: 0 0 5px #03e9f4,0 0 25px #03e9f4,0 0 50px #03e9f4,0 0 250px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
    filter: hue-rotate(80deg);
   
}

.workout-button{
    display: inline-block;
    color: #fff;
    text-decoration: none;
    text-align: center;

    position: relative;
    transition: color 0.3s;
}
.workout-button:hover {
    
    border-style: solid;
  border-color: #03e9f4;
  -webkit-text-fill-color: #000505;
  background: #03e9f4;
    color: #050801;
    box-shadow: 0 0 5px #03e9f4,0 0 25px #03e9f4,0 0 50px #03e9f4,0 0 250px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
    filter: hue-rotate(175deg);
}

.diet-button{
    display: inline-block;
    color: #fff;
    text-decoration: none;
    text-align: center;

    position: relative;
    transition: color 0.3s;
}
.diet-button:hover {
 
    border-style: solid;
  border-color: #03e9f4;
  -webkit-text-fill-color: #000505;
  background: #03e9f4;
    color: #050801;
    box-shadow: 0 0 5px #03e9f4,0 0 25px #03e9f4,0 0 50px #03e9f4,0 0 250px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
    filter: hue-rotate(225deg);
   
}

.product-button{
    display: inline-block;
    color: #fff;
    text-decoration: none;
    text-align: center;

    position: relative;
    transition: color 0.3s;
}
.product-button:hover {
   
    border-style: solid;
  border-color: #1ef35ee5;
  -webkit-text-fill-color: #000505;
  background: #1ef35ee5;
    color: #050801;
    box-shadow: 0 0 5px #1ef35ee5,0 0 25px #1ef35ee5,0 0 50px #1ef35ee5,0 0 250px #1ef35ee5;
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
   
}
.aboutus-button{
    display: inline-block;
    
    text-decoration: none;
    text-align: center;

    position: relative;
   
}
.aboutus-button:hover {
    
    border-style: solid;
  border-color:rgb(0, 255, 55);
  -webkit-text-fill-color: #000505;
  background:rgb(0, 255, 55);
    color: #050801;
    box-shadow: 0 0 5px rgb(0, 255, 55),0 0 25px rgb(0, 255, 55),0 0 50px rgb(0, 255, 55),0 0 250px rgb(0, 255, 55);
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
    filter: hue-rotate(80deg);
    
   
}
.logout-button{
    display: inline-block;
    color: #fff;
    
    text-decoration: none;
    text-align: center;
    
    
    position: relative;
    transition: color 0.3s;
}
.logout-button:hover {
    border-style: solid;
  border-color:rgb(0, 176, 79);
  -webkit-text-fill-color: #000505;
    background:rgb(0, 176, 79);
    color:rgb(8, 1, 1);
    box-shadow: 0 0 5px rgb(29, 90, 0),0 0 25px rgb(29, 90, 0),0 0 50px rgb(29, 90, 0),0 0 250px rgb(29, 90, 0);
    -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
    filter: hue-rotate(225deg);
}


        .hero {
    text-align: center;
    padding: 100px 20px;
    background: rgba(0, 0, 0, 0); /* Semi-transparent background for better contrast */
   
    display: block; /* Ensures block-level element for full width */
    margin: auto; /* Centers the content horizontally */
    
    width: 100%; /* Ensures hero takes full width */
    max-width: 800px; /* Optional: limits max width for the hero section */
}

.hero h1, .hero p {
    font-size: 3rem; /* Adjust as needed */
    margin-bottom: 10px;
    color: #fff; /* White text color */
    text-shadow: 0 0 10px #ff5722, 0 0 20px #ff5722, 0 0 30px #ff5722, 0 0 40px #ff5722;
    animation: colorGlow 3s infinite alternate;
    text-align: center; /* Centers text within the hero */
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 20px;
    text-shadow: 0 0 10px #00bcd4, 0 0 20px #00bcd4, 0 0 30px #00bcd4;
}

@keyframes colorGlow {
    0% {
        text-shadow: 0 0 10px #ff5722, 0 0 20px #ff5722, 0 0 30px #ff5722, 0 0 40px #ff5722;
        color: #fff; /* White text */
    }
    33% {
        text-shadow: 0 0 10px rgb(21, 255, 0), 0 0 20px rgb(21, 255, 0), 0 0 30px rgb(21, 255, 0), 0 0 40px rgb(21, 255, 0);
        color: #fff; /* White text */
    }
    66% {
        text-shadow: 0 0 10px rgb(0, 132, 255), 0 0 20px rgb(0, 132, 255), 0 0 30px rgb(0, 132, 255), 0 0 40px rgb(0, 132, 255);
        color: #fff; /* White text */
    }
    100% {
        text-shadow: 0 0 10px #ff4081, 0 0 20px #ff4081, 0 0 30px #ff4081, 0 0 40px #ff4081;
        color: #fff; /* White text */
    }
}


        .hero .btn {
            background-color: #ff5722;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(255, 87, 34, 0.7);
            transition: transform 0.3s;
        }

        .hero .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .hero .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(255, 87, 34, 1);
        }

        .hero .btn:hover::after {
            opacity: 1;
        }
        footer {
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Gym Evolve Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php"class="home-button">Home</a></li>
                <li><a href="workout/workout.php"class="workout-button">Workouts</a></li>
                <li><a href="diet/plan.php"class="diet-button">Diet Plan</a></li>
                <li><a href="products.php"class="product-button">Products</a></li>
                <li><a href="aboutus.html"class="aboutus-button">About Us</a></li>
                
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Show Logout link if user is logged in -->
                    <li><a href="logout.php"class="logout-button">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main class="hero">
        <h1>Welcome to Gym Evolve</h1>
        <p>Your fitness journey starts here.</p>
        <a href="<?php echo $buttonLink; ?>" class="btn"><?php echo $buttonText; ?></a>
    </main>

    <footer>
        <p>&copy; 2024 Gym Evolve. All rights reserved.</p>
    </footer>
</body>
</html>
