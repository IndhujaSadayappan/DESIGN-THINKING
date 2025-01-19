<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Connect</title>
    <style>

        body {
            background-color: black;
            color: white;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-fluid {
            height: 100%;
            width: 100%;
            background: #ffffff;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-attachment: scroll;
        }

        .cube {
            position: absolute;
            top: 80vh;
            left: 45vw;
            width: 10px;
            height: 10px;
            border: solid 1px #ffffff;
            transform-origin: top left;
            transform: scale(0) rotate(0deg) translate(-50%, -50%);
            animation: cube 12s ease forwards infinite;
        }

        .cube:nth-child(2) {
            animation-delay: 2s;
            left: 25vw;
            top: 40vh;
        }

        .cube:nth-child(3) {
            animation-delay: 3s;
            left: 75vw;
            top: 50vh;
        }

        @keyframes cube {
            from {
                transform: scale(0) rotate(0deg) translate(-50%, -50%);
                opacity: 1;
            }
            to {
                transform: scale(20) rotate(960deg) translate(-50%, -50%);
                opacity: 0;
            }
        }

        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 10vh;
        }

        .mc {
            position: relative;
            border-right: 2px solid rgba(255,255,255,.75);
            text-transform: uppercase;
            text-align: center;
            font-size: 80px;
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            background: linear-gradient(90deg, rgba(186,148,62,1) 0%, rgba(236,172,32,1) 20%, rgba(186,148,62,1) 39%, rgba(249,244,180,1) 50%, rgba(186,148,62,1) 60%, rgba(236,172,32,1) 80%, rgba(186,148,62,1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s infinite, typewriter 3s steps(20) 1s 1 normal both, blinkingCursor 1s steps(40) infinite 5s forwards;
            display: inline-block;
            background-size: 200%;
        }

        @keyframes typewriter {
            from { width: 0; }
            to { width: 67%; }
        }

        @keyframes blinkingCursor {
            0%, 50% { border-right-color: rgba(255,255,255,.75); }
            100% { border-right-color: transparent; }
        }

        @keyframes shine {
            to { background-position: right; }
        }

        .body {
            margin-top: 10px;
            padding: 10px;
            opacity: 0.9;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 200px;
            flex-wrap: wrap;
        }

        .element-card {
            position: relative;
            width: 400px;
            height: 380px;
            transform-style: preserve-3d;
            transform: rotateY(0deg);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.4);
            margin: 5px;
            cursor: pointer;
        }

        .element-card.open {
            width: 450px;
            height: 400px;
            transform: rotateY(-180deg);
        }

        .front-facing, .back-facing {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(115deg, black, black, black, black, black, grey, black, black, black, black, black 100%);
            animation: shine 2s infinite;
            display: inline-block;
            background-size: 400% 400%;
            border-radius: 10px;
            backface-visibility: hidden;
            border: 3px solid rgb(255, 255, 255);
        }

        .front-facing {
            transform: rotateY(0deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .back-facing {
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .title {
            margin: 0px;
            font-size: 50px;
            background: linear-gradient(90deg, rgba(186,148,62,1) 0%, rgb(211, 55, 27) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shine 3s infinite;
            background-size: 200%;
        }

        .btn {
            height: 90px;
            width: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            color: rgb(0, 0, 0);
            background: rgb(255, 179, 0);
            border: 3px solid black;
            text-decoration: none;
            border-radius: 10px;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 800;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn:hover {
            animation: jiggle 0.5s ease forwards, glow 2s ease-in-out infinite;
            background-color: #fbf421;
            color: #000000;
            transform: scale(1.1);
        }

        @keyframes jiggle {
            0% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            50% { transform: translateX(10px); }
            75% { transform: translateX(-10px); }
            100% { transform: translateX(0); }
        }

        @keyframes glow {
            0% { box-shadow: 0 0 10px rgba(255, 250, 33, 0.5); }
            50% { box-shadow: 0 0 20px rgba(255, 250, 33, 0.8); }
            100% { box-shadow: 0 0 10px rgba(255, 250, 33, 0.5); }
        }

        @media (max-width: 768px) {
            .mc {
                font-size: 60px;
            }

            .container {
                gap: 30px;
            }

            .element-card {
                width: 250px;
                height: 280px;
            }

            .btn {
                height: 50px;
                width: 120px;
                font-size: 16px;
            }

            .title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .mc {
                font-size: 40px;
            }

            .container {
                flex-direction: column;
            }

            .element-card {
                width: 100%; 
                max-width: 300px;
            }

            .btn {
                height: 40px;
                width: 100px;
                font-size: 14px;
            }

            .title {
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .mc {
                font-size: 60px;
                max-width: 90%;
                white-space: normal;
                text-align: center;
                margin: 0 auto;
            }

            .container {
                gap: 20px;
            }

            .element-card {
                width: 250px;
                height: 280px;
            }

            .btn {
                height: 50px;
                width: 120px;
                font-size: 16px;
            }

            .title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .mc {
                font-size: 40px;
                max-width: 90%;
                white-space: normal;
                text-align: center;
                margin: 0 auto;
            }

            .container {
                flex-direction: column;
                align-items: center;
            }

            .element-card {
                width: 100%; 
                max-width: 300px;
            }

            .btn {
                height: 40px;
                width: 100px;
                font-size: 14px;
            }

            .title {
                font-size: 20px;
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="background">
            <div class="cube"></div>
            <div class="cube"></div>
        </div>
    </div>
    <div class="center">
        <h1 class="mc">Mentor Connect</h1>
    </div>
    <div class="body">
        <div class="container">
            <div class="element-card">
                <div class="front-facing">
                    <h1 class="title">Mentor</h1>
                </div>
                <div class="back-facing">
                    <a class="btn" href="mentorlogin.php" target="_blank">Log in</a>
                    <a class="btn" href="mentorsignup.php" target="_blank">Sign Up</a>
                </div>
            </div>
            <div class="element-card">
                <div class="front-facing">
                    <h1 class="title">Mentee</h1>
                </div>
                <div class="back-facing">
                    <a class="btn" href="menteelogin.php" target="_blank">Log in</a>
                    <a class="btn" href="menteesignup.php" target="_blank">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.element-card').forEach(card => {
            card.addEventListener('click', function () {
                const isOpen = this.classList.contains('open');
                document.querySelectorAll('.element-card').forEach(c => c.classList.remove('open'));
                if (!isOpen) this.classList.add('open');
            });
        });
    </script>
</body>
</html>
