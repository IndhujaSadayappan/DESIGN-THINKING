<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
      
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #2c3e50, #4ca1af);
            color: black;
            overflow: hidden;
            background-color: black;
        }

   
        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .cube {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid;
            border-image: conic-gradient(from 0deg, rgba(255, 255, 255, 0.8), rgba(200, 200, 200, 0.5), rgba(255, 255, 255, 0.8));
            border-image-slice: 1;
            border-radius: 50%;
            animation: spinCube 5s linear infinite, growAndFade 5s ease-in-out infinite;
            transform-origin: center;
            z-index: -1;
        }

        @keyframes spinCube {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes growAndFade {
            0%, 100% {
                transform: scale(0);
                opacity: 1;
            }
            50% {
                transform: scale(3);
                opacity: 0.5;
            }
        }


        .cube:nth-child(1) { top: 10%; left: 20%; animation-duration: 4s; }
        .cube:nth-child(2) { top: 50%; left: 40%; animation-duration: 6s; }
        .cube:nth-child(3) { top: 80%; left: 70%; animation-duration: 8s; }
        .cube:nth-child(4) { top: 10%; left: 80%; animation-duration: 10s; }
        .cube:nth-child(5) { top: 50%; left: 20%; animation-duration: 12s; }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 10; 
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }


        .center-text {
            font-size: 5rem;
            font-weight: bold;
            color: white;
            margin: 0;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);
        }

        .get-started-btn {
            margin-top: 1rem;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background: #4ca1af;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .get-started-btn:hover {
            background: #2c3e50;
            transform: scale(1.1);
        }
     
.interactive-description {
    font-size: 1.5rem;
    color: #f0f0f0;
    margin: 1rem 0;
    line-height: 1.8;
    text-shadow: 0 0 5px rgba(255, 255, 255, 0.6);
    animation: fadeText 3s ease-in-out infinite alternate;
}

@keyframes fadeText {
    from {
        opacity: 1;
    }
    to {
        opacity: 0.8;
    }
}

    </style>
</head>
<body>
   
    <div class="background">
        <div class="cube" style="top: 20%; left: 30%; animation-delay: 0s;"></div>
        <div class="cube" style="top: 40%; left: 60%; animation-delay: 1s;"></div>
        <div class="cube" style="top: 70%; left: 50%; animation-delay: 2s;"></div>
        <div class="cube" style="top: 10%; left: 80%; animation-delay: 3s;"></div>
        <div class="cube" style="top: 50%; left: 20%; animation-delay: 4s;"></div>
    </div>

<div class="content">
    <h1 class="center-text">Mentor Connect</h1>
    <p class="interactive-description">
        Welcome to the <strong>Mentoring Platform</strong>, where connections transform potential into reality. 
        Unlock access to inspiring mentors, actionable insights, and unparalleled growth opportunities.
    </p>
    <button class="get-started-btn">Get Started</button>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cubes = document.querySelectorAll('.cube');

       
            cubes.forEach(cube => {
                cube.addEventListener('mouseenter', () => {
                    cube.style.border = '2px solid rgba(0, 255, 255, 0.9)';
                });
                cube.addEventListener('mouseleave', () => {
                    cube.style.border = '2px solid';
                    cube.style.borderImage = 'conic-gradient(from 0deg, rgba(255, 255, 255, 0.8), rgba(200, 200, 200, 0.5), rgba(255, 255, 255, 0.8))';
                });
            });

const button = document.querySelector('.get-started-btn');
button.addEventListener('click', () => {
    window.location.href='index.php';
});

        });
    </script>
</body>
</html>
