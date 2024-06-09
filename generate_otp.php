<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

session_start();
function generateOtp() {
    // Generate a random number between 100000 and 999999
    $otp = random_int(100000, 999999);
    return $otp;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Check if 'name' and 'email' keys exist in $_POST array
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $_SESSION['otp'] = generateOtp();
    $otp = $_SESSION['otp'];

} else {
    // If the form wasn't submitted, redirect to the form page
    // header("Loation: ./index.html");  
    echo "<h1 style='text-align: center;'>Error in OTP generation Please Provide correct mail Id</h1> <div> <a href='./index.html'>Click Here</a>To Go Home Page</div>";
    exit();
}

try { 
    //Server settings
    $mail->SMTPDebug = false; //Enable verbose debug output (use-2)
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
 
    $mail->Username = 'shubh.lingayat2003@gmail.com';
    $mail->Password = 'wxuy mbnl asnv qctp'; 
    $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("shubh.lingayat2003@gmail.com", "GladOwl");
    $mail->addAddress($email, $fullname); //Name is optional
    // $mail->AddAddress('test@gmail.com', 'person-name');
 
    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Email Verification Mail From GladOwl';
    $mail->Body = "Hello $fullname, Your One Time Password is: $otp. Do not share with anyone"; 
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // header("Location: ./index.html");
    // echo 'Message has been sent';
    // echo '<script> alert("Success");</script>';
    
    // window.location.href="./index.html";
} catch (Exception $e) {
    echo "<h1 style='text-align: center;'>Message could not be sent. Mailer Error: {$mail->ErrorInfo} </h1><div> <a href='./index.html'>Click Here</a>To Go Home Page</div>";
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CUCET Application</title>
    <link rel="stylesheet" href="/styles.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {},
          screens: {
            sm: "320px",
            // => @media (min-width: 640px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
          },
          colors: {
            deepblue: "#174877",
            // deepbluebg: "rgba(20,73,120,0.80)",
            deepbluebg: "rgba(23,72,119,0.80)",
            startyourtest: "#0990F8",
            transparent: "transparent",
            white: "#ffffff",
            black: "rgb(0,0,0)",
            yellowline: "#F7A300",
            loginbutton: "#84A1B8",
            university: "#E5F0F1",
            bgblue: "#123b70",
            bordercolor: "rgba(173, 225, 250, 0.15)",
            registration: "#e4363d",
            bgtemplate: "#F1F9FA",
            fontcolorsky: "#0990f8",
            dropdown: "#5c5c5c",
            borderbottom: "#f5f4f4",
            dropdownhover: "#ECECEC",
            benefitstemplate: "rgba(9, 144, 248,0.70)",
            benefitstemp: "rgba(23,72,119,0.70)",
            templatecolorbg: "rgba(23,72,119,0.90)",
            bordertemplate: "rgba(10, 109, 156, .15)",
            textgrey: "#666666",
            buttongrey: "#597CA2",
            textlightgrey: "#A3B4CD",
            inputbox: "#69727a",
            buttonyellow: "#E9C681",
            bordercourse: "rgba(255, 255, 255, .3)",
          },
        },
      };
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .btn1 {
          animation-name: btn1;
          animation-duration: 1s;
          animation-delay: 0s;
          animation-iteration-count: infinite;
          background-image: linear-gradient(
            to right,
            rgba(0, 0, 0, 0),
            rgb(255, 255, 255, 1)
          );
        }

        @keyframes btn1 {
          0% {
            left: -50%;
            top: 0px;
          }
          100% {
            left: 100%;
            top: 0px;
          }
        }

        .btn2 {
          animation-name: btn2;
          animation-duration: 0.5s;
          animation-delay: 1s;
          animation-iteration-count: infinite;
          background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0),
            rgb(255, 255, 255, 1)
          );
        }

        @keyframes btn2 {
          0% {
            right: 0px;
            top: -30px;
          }
          100% {
            right: 0px;
            top: 100%;
          }
        }

        .btn3 {
          animation-name: btn3;
          animation-duration: 1s;
          animation-delay: 1.5s;
          animation-iteration-count: infinite;
          background-image: linear-gradient(
            to left,
            rgba(0, 0, 0, 0),
            rgb(255, 255, 255, 1)
          );
        }

        @keyframes btn3 {
          0% {
            right: -50%;
            bottom: 0px;
          }
          100% {
            right: 100%;
            bottom: 0px;
          }
        }

        .btn4 {
          animation-name: btn4;
          animation-duration: 0.5s;
          animation-delay: 2s;
          animation-iteration-count: infinite;
          background-image: linear-gradient(
            to top,
            rgba(0, 0, 0, 0),
            rgb(255, 255, 255, 1)
          );
        }

        @keyframes btn4 {
          0% {
            left: 0px;
            bottom: -30px;
          }
          100% {
            left: 0px;
            bottom: 100%;
          }
        }
        /* OPENSANS (worksans) bold 700*/
        @font-face {
          font-family: opensans;
          src: url("./fonts/Work_Sans/static/WorkSans-Bold.ttf");
        }

        .opensans {
          font-family: opensans;
        }

        * {
          box-sizing: border-box;
        }
        /* WorkSans Semi-bold 600 */
        @font-face {
          font-family: semibold;
          src: url("./fonts/Work_Sans/static/WorkSans-SemiBold.ttf");
        }

        .semibold {
          font-family: semibold;
        }

        /* WorkSans medium 500*/
        @font-face {
          font-family: sansmedium;
          src: url("./fonts/Work_Sans/static/WorkSans-Medium.ttf");
        }

        .sansmedium {
          font-family: sansmedium;
        }

        /* WorkSans regular 400*/
        @font-face {
          font-family: worksansregular;
          src: url("./fonts/Work_Sans/static/WorkSans-Regular.ttf");
        }

        .worksansregular {
          font-family: worksansregular;
        }

        /* Lufga Black-900 */
        @font-face {
          font-family: lufga;
          src: url("./fonts/lufga/LufgaBlack.ttf");
        }

        .lufga {
          font-family: lufga;
        }

        /* Lufga Bold-700 */
        @font-face {
          font-family: lufgabold;
          src: url("./fonts/lufga/LufgaBold.ttf");
        }

        .lufgabold {
          font-family: lufgabold;
        }
        /* lufga extra-bold 800 */
        @font-face {
          font-family: lufgaextrabold;
          src: url("./fonts/lufga/LufgaExtraBold.ttf");
        }

        .lufgaextrabold {
          font-family: lufgaextrabold;
        }

        #navbar {
          transition: top 0.3s;
        }

        #first {
          display: block;
        }

        /* .animation1 {
        animation-name: animation1;
        animation-duration: 0.5s;
        animation-delay: 2s;
        position: relative;
        animation-iteration-count: 3;
      }

      @keyframes animation1 {
        0% {
          right: 0%;
        }
        100% {
          right: 100%;
        }
      } */

        .dot {
          height: 5px;
          width: 5px;
          margin: 0 4px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }

        .active {
          background-color: #250fef;
        }

        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }

        @keyframes fade {
          from {
            opacity: 0.4;
          }
          to {
            opacity: 1;
          }
        }

        .cursor-grab1 {
          cursor: default; /* Set cursor to default */
          -webkit-user-select: none; /* Disable text selection */
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          -webkit-tap-highlight-color: transparent; /* Disable tap highlight */
          -webkit-touch-callout: none; /* Disable callout */
          -webkit-scroll-behavior: smooth; /* Smooth scrolling */
        }

        .overflow-x-scroll::-webkit-scrollbar {
          display: none; /* Hide scrollbar for Webkit browsers */
        }

        .overflow-x-scroll1 {
          overflow-x: auto; /* Enable horizontal scrolling */
          overflow-y: hidden; /* Hide vertical scrollbar */
          scrollbar-width: none; /* Firefox */
          -ms-overflow-style: none; /* Internet Explorer and Edge */
        }
      }
    </style>
  </head>
  <body onscroll="hideNavbar()">
    <div class="wrapper overflow-x-hidden">
      <!-- Section-1 -->
      <div
        class="secion1 z-10 w-full overflow-y-visible sticky top-0"
        id="first"
      >
        <!-- Navigation Bar -->
        <nav class="bg-deepblue overflow-y-visible relative" id="navbar">
          <div
            class="overflow-y-visible relative max-w-[1920px] h-20 mx-auto flex items-center w-[90%] justify-between"
          >
            <!-- logo -->
            <span class="relative flex">
              <a
                href="#"
                class="cursor-pointer sm:pt-9 lg:py-7 lg:pt-6 lg:px-7 sm:px-4 overflow-y-visible bg-white rounded-[30px]"
              >
                <img
                  src="./images/cucet-logo.png"
                  class="lg:w-[200px] sm:w-[100px] pt-4"
                  alt=""
                />
              </a>
              <div class="bg-white h-[83px] mt-7 w-[100px]">
                <div class="rounded-tl-[60px] bg-deepblue h-full w-full"></div>
              </div>
            </span>
            <!-- Tab links -->
            <ul class="gap-10 mr-20 pt-[17px] ml-[-20px] sm:hidden lg:flex">
              <li
                class="text-white text-[17px] z-10 tracking-wide font-bold py-7 cursor-pointer relative group"
              >
                <span class="flex items-baseline gap-1">
                  <a href="#" class="sansmedium">WHY CUCET</a>
                  <img
                    src="./images/icons8-less-than-50.png"
                    alt=""
                    class="h-4 w-4 -rotate-90"
                  />
                </span>
                <div
                  class="drop-down absolute w-full h-1 bottom-0 group-hover:bg-yellowline"
                ></div>
                <ul
                  class="bg-white drop-down-content group-hover:flex hidden font-thin text-sm absolute mt-[23%] text-dropdown w-[270px] flex-col content-center z-10"
                >
                  <li class="hover:bg-dropdownhover pt-4">
                    <span class="hover:bg-slate-300">
                      <p class="pl-6 pb-2 worksansregular">About CUCET</p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">
                        Question Paper Pattern
                      </p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">Sample Paper</p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">Syllabus</p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4 pb-4">
                    <span>
                      <p class="worksansregular pl-6">Video Gallery</p>
                    </span>
                  </li>
                </ul>
              </li>

              <li
                class="text-white text-[17px] z-10 tracking-wide font-bold py-7 cursor-pointer relative group"
              >
                <span class="flex items-baseline gap-1">
                  <a href="#" class="sansmedium">PROGRAMS</a>
                  <img
                    src="./images/icons8-less-than-50.png"
                    alt=""
                    class="h-4 w-4 -rotate-90"
                  />
                </span>
                <div
                  class="absolute w-full h-1 bottom-0 group-hover:bg-yellowline"
                ></div>
                <ul
                  class="bg-white drop-down-content group-hover:flex hidden font-thin text-sm absolute mt-[25%] text-dropdown w-[270px] flex-col content-center z-10"
                >
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">
                        After 12th Programs
                      </p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">
                        After Graduation programs
                      </p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pt-4">
                    <span>
                      <p class="worksansregular pl-6 pb-2">
                        Lateral Entry programs
                      </p>
                      <div
                        class="w-full h-[0.5px] bg-borderbottom bottom-0"
                      ></div>
                    </span>
                  </li>
                  <li class="hover:bg-dropdownhover pb-4 pt-4">
                    <span>
                      <p class="worksansregular pl-6">Advance Credit Program</p>
                    </span>
                  </li>
                </ul>
              </li>

              <li
                class="text-white text-[17px] z-10 tracking-wide font-bold py-7 cursor-pointer relative group"
              >
                <span class="flex items-baseline gap-1">
                  <a href="#" class="sansmedium">HOW TO APPLY</a>
                  <img
                    src="./images/icons8-less-than-50.png"
                    alt=""
                    class="h-4 w-4 -rotate-90"
                  />
                </span>
                <div
                  class="absolute w-full h-1 bottom-0 group-hover:bg-yellowline"
                ></div>
                <ul
                  class="bg-white hover:bg-dropdownhover drop-down-content group-hover:flex hidden font-thin text-sm absolute mt-[20%] py-4 text-dropdown w-[270px] flex-col gap-4 content-center z-10"
                >
                  <li>
                    <p class="worksansregular pl-6">Application Process</p>
                  </li>
                </ul>
              </li>

              <li
                class="text-white text-[17px] z-10 tracking-wide font-bold py-7 cursor-pointer relative group"
              >
                <a href="#" class="sansmedium">FAQ</a>
                <div
                  class="absolute w-full h-1 bottom-0 group-hover:bg-yellowline"
                ></div>
              </li>

              <li
                class="text-white text-[17px] z-10 tracking-wide font-bold py-7 cursor-pointer relative group"
              >
                <a href="#" class="sansmedium">CONTACT US</a>
                <div
                  class="absolute w-full h-1 bottom-0 group-hover:bg-yellowline"
                ></div>
              </li>
            </ul>

            <!-- START YOUR TEST button -->
            <button
              class="bg-startyourtest sm:hidden lg:block mt-2 py-3 tracking-wider text-sm font-bold bg-blue-500 px-8 rounded-lg text-center text-white relative overflow-hidden hover:bg-yellowline"
            >
              <div
                class="h-[1.5px] w-[50%] left-0 top-0 absolute overflow-hidden btn1"
              ></div>
              <div
                class="w-[3px] h-12 right-0 top-[-120%] absolute overflow-hidden btn2"
              ></div>
              <div
                class="h-[2px] w-[50%] right-[-120%] bottom-0 absolute overflow-hidden btn3"
              ></div>
              <div
                class="w-[3px] h-12 left-0 bottom-[-120%] absolute overflow-hidden btn4"
              ></div>
              START YOUR TEST
              <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </nav>
      </div>
      <!-- Section-2 -->
      <div
        class="bg-[url('./images/herobanner.png')] top-[-80px] relative h-screen w-screen bg-cover overflow-hidden"
        id="second"
      >
        <span
          class="bg-gradient-to-b from-deepblue to-deepbluebg w-full h-full flex overflow-hidden"
        >
          <!-- First Column -->
          <span class="w-[33.33%] pt-[215px] pl-[135px]">
            <span class="text-white font-bold"
              >FUELING FUTURES, EMPOWERING DREAMS
            </span>
            <h1>
              <span
                class="text-startyourtest leading-tight font-extrabold text-[65px] lufga"
                >INDIA'S NO. 1
              </span>
              <span
                class="text-university leading-8 font-black text-[65px] lufga"
                >PRIVATE</span
              >

              <span
                class="text-university leading-[55px] font-black text-[65px] lufga"
                >UNIVERSITY</span
              >
            </h1>

            <p class="text-white text-[14.5px] pt-[12px] leading-[18px]">
              Chandigarh University Common Entrance Test (CUCET) <br />opens the
              doors to global opportunities and exceptional <br />
              careers, recognizing academic excellence and providing <br />
              remarkable support through
            </p>
            <div class="text-white text-[23px] leading-[1.2] pt-6 semibold">
              Scholarships worth
            </div>
            <span
              class="text-white pt-2 h-[110px] items-center text-[132px] relative max-w-[345px] lufga leading-[110px] flex"
            >
              <img
                src="./images/code-img-left.png"
                alt=""
                class="absolute h-[70%] w-auto left-0"
              />
              <sup
                class="absolute left-[45px] top-[-19px] text-[32px] leading-[81px] text-startyourtest"
                >₹</sup
              >
              <p class="pl-16">170</p>
              <sub class="text-[32px] absolute right-[37px] bottom-[30px]"
                >CR</sub
              >
              <img
                src="./images/code-img-right.png"
                alt=""
                class="absolute h-[70%] w-auto right-0"
              />
            </span>
          </span>
          <!-- Second Column -->
          <span class="w-[33.33%] pt-[80px] relative">
            <div
              class="flex bg-bgblue border-solid pb-[10px] pt-[15px] px-[25px] rounded-[20px] border-[1px] border-bordercolor flex-col max-w-[50%] justify-center relative left-[-73px] top-[390px]"
            >
              <img
                src="./images/twinkle-border.png"
                alt=""
                class="absolute left-[-10px]"
              />
              <h2 class="text-[18px] text-white lufga mb-0 lufgabold">
                EARN UP TO <br />
                <span
                  class="text-[60px] lufga leading-[52px] text-startyourtest"
                  >100%</span
                >
                <br />
                <span class="text-[24px] lufga leading-[10px]"
                  >SCHOLARSHIP</span
                >
              </h2>
              <p class="text-white text-[14.5px] pb-2 leading-[18px]">
                to unlock your scholarly <br />
                potential and pave the way for <br />
                your bright future.
              </p>
            </div>
            <img
              src="./images/scholars-image.png"
              alt=""
              class="absolute left-[130px] top-[188px]"
            />
            <img
              src="./images/border-shade.png"
              alt=""
              class="absolute right-7 top-[220px]"
            />
          </span>
          <!-- Third Column -->
          <span class="w-[33.33%] pt-[80px]">
            <div
              class="w-full h-full flex content-center flex-col ml-[-45px] mt-[105px] items-center"
            >
              <!-- Registration Header -->
              <div class="flex flex-col justify-center items-center mb-4">
                <h4 class="text-white text-[24px] mb-[-1px] semibold">
                  CUCET APPLICATION FORM 2024
                </h4>
                <h6 class="mb-[2px]">
                  <b class="text-white text-[14px] semibold"
                    >APPLY FOR CUCET 2024 (PHASE-I)</b
                  >
                </h6>
                <h6
                  class="bg-registration semibold text-white py-[5px] px-[8px] text-[12px] leading-[14px] rounded-[6px] mb-[]"
                >
                  <b>REGISTRATION END DATE: 10 JUNE 2024</b>
                </h6>
              </div>
              <!-- Form Body -->
              <form
                action="./form.php"
                method="POST"
                class="h-[355px] relative w-[442.33px] content-center flex gap-3 flex-col items-center"
              >
                <input
                  name="fullname"
                  type="text"
                  value='<?php echo "$fullname"; ?>'
                  placeholder="ENTER STUDENT NAME"
                  class="w-[64%] h-[48px] pr-[36px] pl-[15px] text-[15px] worksansregular rounded-md text-black border-[1px] border-textgrey"
                />
                <div
                  class="relative w-[442.33px] content-center flex gap-3 flex-col items-center"
                >
                  <input
                    type="text"
                    name="email"
                    type="email"
                    id="email"
                    value='<?php echo "$email"; ?>'
                    placeholder="ENTER STUDENT EMAIL ID"
                    class="w-[64%] h-[48px] pr-[36px] pl-[15px] text-[15px] worksansregular rounded-md text-black border-[1px] border-textgrey"
                  />
                  <p
                    id="result"
                    class="text-[red] top-[30px] z-30 text-[12px] right-[90px] absolute"
                  ></p>
                  <p
                    id="result2"
                    class="text-[green] top-[30px] text-[12px] right-[90px] absolute"
                  ></p>

                  <script src="https://cdn.jsdelivr.net/npm/validator@13.6.0/validator.min.js"></script>
                  <script>
                    const emailInput = document.getElementById("email");
                    const resultElement = document.getElementById("result");
                    const resultEl = document.getElementById("result2");

                    emailInput.addEventListener("input", function () {
                      const email = emailInput.value;

                      if (validator.isEmail(email)) {
                        resultEl.innerText = "Email address is valid";
                        resultElement.innerText = "";
                      } else {
                        resultElement.innerText = "Email address is invalid";
                        resultEl.innerText = "";
                      }
                    });
                  </script>
                  <button
                    type="submit"
                    formaction="./generate_otp.php"
                    formmethod="post"
                    class="bg-fontcolorsky w-[64%] h-10 py-[10px] px-[15px] text-[12px] semibold rounded-md text-center text-white relative hover:bg-yellowline"
                  >
                    SEND OTP
                  </button>
                </div>
                <span
                  action="./verify_otp.php"
                  class="w-full flex items-center content-center gap-2 pl-[80px] pr-0"
                  id="verifyOTPForm"
                >
                  <input
                    type="text"
                    name="otp" 
                    placeholder="ENTER OTP"
                    class="w-[35%] h-10 pl-[15px] text-[14px] tracking-widest worksansregular rounded-md text-black border-[1px] border-textgrey"
                  />
                  <button
                    formaction="./verify_otp.php"
                    formmethod="post"
                    class="bg-fontcolorsky w-[40%] h-10 py-[10px] px-[15px] text-[12px] semibold rounded-md text-center text-white relative hover:bg-yellowline"
                  >
                    Confirm OTP
                  </button>
                </span>
                <input
                  type="text"
                  name="phone"
                  placeholder="ENTER STUDENT PHONE NUMBER"
                  class="w-[64%] h-[48px] pr-[36px] pl-[15px] text-[15px] worksansregular rounded-md text-black border-[1px] border-textgrey"
                />
                <div class="w-full ml-[160px] flex gap-4">
                  <button
                    value="submit"
                    type="submit"
                    formaction="./form.php"
                    formmethod="post"
                    class="bg-fontcolorsky w-[30%] h-[49px] py-[14px] px-[35px] text-[14px] semibold rounded-lg text-center text-white relative hover:bg-yellowline"
                  >
                    REGISTER
                  </button>

                  <button
                    class="bg-fontcolorsky w-[30%] h-[49px] py-[14px] px-[35px] text-[14px] semibold rounded-lg text-center text-white relative hover:bg-yellowline"
                  >
                    LOG IN
                  </button>
                </div>
              </form>

              <!-- Form footer -->
              <div>
                <p class="text-white text-[12px] text-center leading-[12px]">
                  By submitting this form, I agree to receive notifications from
                  the <br />
                  University in the form of SMS/E-mail/Call.
                </p>
              </div>
            </div>
          </span>
        </span>
      </div>
      <!-- Section-3 -->
      <div
        class="ml-[7.2%] h-[250px] mt-[-180px] z-20 relative overflow-hidden"
      >
        <!-- Crown content -->
        <div class="flex gap-[20px] h-[181px]">
          <!-- first template -->
          <div
            class="flex min-w-[526.66px] rounded-lg bg-bgtemplate px-[23px] py-[23px]"
          >
            <div class="text-[24px] leading-[26px] semibold">
              <p class="text-fontcolorsky">
                BESTOWED WITH A+ <br />
                ACCREDITATION <br />
              </p>
              <p>
                BY NATIONAL ASSESSMENT <br />
                AND ACCREDITATION <br />
                COUNCIL (NAAC)
              </p>
            </div>
            <img
              src="./images/naac-logo-black.png"
              alt=""
              class="w-[150px] h-[53.5px]"
            />
          </div>
          <!-- second template -->
          <div
            class="flex rounded-lg bg-bgtemplate px-[23px] py-[23px] min-w-[389px] h-[181px]"
          >
            <div class="flex content-center flex-col gap-0">
              <p class="text-[12px] semibold pt-4">CU RANKS</p>
              <p class="text-fontcolorsky text-[30px] leading-[34px] semibold">
                <sub class="relative left-2 bottom-0 opensans">#</sub>
                691-700
              </p>
              <p class="text-[17px] pt-1 leading-[16px] semibold">
                AMONG TOP HIGHER <br />
                EDUCATIONAL <br />
                INSTITUTIONS GLOBALLY
              </p>
            </div>
            <img
              src="./images/qs-india-ranking-logo-black-2025.png"
              alt=""
              class="w-[120px] h-[44.8px] mt-10"
            />
          </div>
          <!-- third template -->
          <div
            class="overflow-x-scroll1 w-[665px] overflow-y-hidden cursor-grab1"
            id="scrollable-container"
          >
            <div
              class="slideshow-container h-[181px] min-w-[4655px] left-0 flex gap-0 rounded-md overflow-y-hidden"
            >
              <!-- span-1 -->
              <span
                class="template-slides h-full min-w-[665px] bg-bgtemplate flex gap-10 px-[23px] py-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      ABET
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      CERTIFYING <br />
                      GLOBAL <br />
                      ENGINEERING <br />
                      EXCELLENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-engg.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      ABET
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      SETTING GLOBAL <br />
                      STANDARDS <br />
                      COMPUTER <br />
                      SCIENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-cse.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>
              </span>

              <!-- span-2 -->
              <span
                class="template-slides min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] pt-1 semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      1 <sup class="asolute left-[-8px] text-[64%]">st</sup>
                    </p>
                    <p class="text-[16px] leading-[16px] mt-[-10px] semibold">
                      AMONGST <br />
                      TOP <br />
                      UNIVERSITIES <br />
                      IN <br />
                      HOSPITALITY & <br />
                      LEISURE <br />
                      MANAGEMENT
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-16"
                  />
                </div>

                <div class="flex gap-7 rounded-lg">
                  <div>
                    <p class="text-[12px] semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      9 <sup class="asolute left-[-8px] text-[64%]">th</sup>
                    </p>
                    <p class="text-[16px] w-[207px] leading-[16px] semibold">
                      AMONGST TOP <br />
                      UNIVERSITIES IN SOCIAL <br />
                      SCIENCES & <br />
                      MANAGEMENT
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] ml-[-20px] w-[125px] mt-10"
                  />
                </div>
              </span>
              <!-- span-3 -->
              <span
                class="template-slides min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] pt-1 semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      10 <sup class="asolute left-[-8px] text-[64%]">th</sup>
                    </p>
                    <p
                      class="text-[16px] leading-[16px] w-[135px] mt-[-5px] semibold"
                    >
                      AMONGST TOP <br />
                      UNIVERSITIES IN <br />
                      COMPUTER <br />
                      SCIENCE & <br />
                      INFORMATION <br />
                      SYSTEMS
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-14"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] pt-6 semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      11 <sup class="asolute left-[-8px] text-[64%]">th</sup>
                    </p>
                    <p class="text-[16px] w-[207px] leading-[16px] semibold">
                      AMONGST TOP <br />
                      UNIVERSITIES IN <br />
                      ENGINEERING & <br />
                      TECHNOLOGY
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] ml-[-50px] w-[125px] mt-14"
                  />
                </div>
              </span>
              <!-- span-4 -->
              <span
                class="template-slides min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] pt-1 semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      14 <sup class="asolute left-[-8px] text-[64%]">th</sup>
                    </p>
                    <p
                      class="text-[16px] leading-[16px] w-[135px] mt-[-5px] semibold"
                    >
                      AMONGST TOP <br />
                      UNIVERSITIES IN <br />
                      ENGINEERING- <br />
                      MECHANICAL <br />
                      ARONAUTICAL & <br />
                      MANUFACTURING
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-14"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] pt-6 semibold">CU RANKS</p>
                    <p
                      class="text-[30px] relative leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      11 <sup class="asolute left-[-8px] text-[64%]">th</sup>
                    </p>
                    <p class="text-[16px] w-[207px] leading-[16px] semibold">
                      AMONGST TOP <br />
                      UNIVERSITIES IN <br />
                      ENGINEERING & <br />
                      TECHNOLOGY
                    </p>
                  </div>
                  <img
                    src="./images/qs-ranking-logo-subject-black.png"
                    alt=""
                    class="h-[48px] ml-[-50px] w-[125px] mt-14"
                  />
                </div>
              </span>
              <!-- span-5 -->
              <span
                class="template-slides min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] py-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      5
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      CERTIFYING <br />
                      GLOBAL <br />
                      ENGINEERING <br />
                      EXCELLENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-engg.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      ABET
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      SETTING GLOBAL <br />
                      STANDARDS <br />
                      COMPUTER <br />
                      SCIENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-cse.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>
              </span>
              <!-- span-6 -->
              <span
                class="template-slide min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] py-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      6
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      CERTIFYING <br />
                      GLOBAL <br />
                      ENGINEERING <br />
                      EXCELLENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-engg.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      ABET
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      SETTING GLOBAL <br />
                      STANDARDS <br />
                      COMPUTER <br />
                      SCIENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-cse.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>
              </span>
              <!-- span-7 -->
              <span
                class="template-slides min-w-[665px] h-full bg-bgtemplate flex gap-10 px-[23px] py-[23px] rounded-lg"
              >
                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      7
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      CERTIFYING <br />
                      GLOBAL <br />
                      ENGINEERING <br />
                      EXCELLENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-engg.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>

                <div class="flex gap-7">
                  <div>
                    <p class="text-[12px] semibold">ACCREDITED BY</p>
                    <p
                      class="text-[30px] leading-[34px] semibold text-fontcolorsky mb-[5px]"
                    >
                      ABET
                    </p>
                    <p class="text-[17px] leading-[16px] semibold">
                      SETTING GLOBAL <br />
                      STANDARDS <br />
                      COMPUTER <br />
                      SCIENCE
                    </p>
                  </div>
                  <img
                    src="./images/abet-logo-cse.png"
                    alt=""
                    class="h-[48px] w-[125px] mt-10"
                  />
                </div>
              </span>
            </div>
          </div>
        </div>

        <div class="absolute right-0 top-0 mt-[180px] mr-[420px]">
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>
      </div>
      <!-- Section-4 -->
      <section class="mx-[15%] pb-[40px]">
        <div class="text-black semibold pb-[40px]">
          <h2 class="text-[24px] leading-[36px] text-center">
            INDIA'S PREMIER SCHOLARSHIP
          </h2>
        </div>
        <div class="h-[576px] w-[1356px] flex">
          <!-- first template -->
          <div
            class="h-full rounded-lg min-w-[339px] pt-[10%] bg-[url('./images/benefit-bg-1.png')]"
          >
            <div
              class="bg-benefitstemplate h-[222px] w-[321px] ml-[5%] rounded-l-lg mt-[45%] text-white px-[24px] py-[24px]"
            >
              <img
                src="./images/graduation-cap.png"
                alt=""
                class="h-[27px] w-[34px] mb-[1rem]"
              />
              <p class="text-[16px] leading-[16px] worksansregular">
                Availed by
              </p>
              <p class="lufgaextrabold text-[54px] leading-[54px]">
                1.30 Lakh+
              </p>
              <p class="text-[24px] leading-[26px] lufgabold max-w-[60%]">
                Students
              </p>
            </div>
          </div>
          <!-- second template -->
          <div
            class="h-full rounded-lg mt-12 w-full pt-[10%] bg-[url('./images/benefit-bg-2.png')]"
          >
            <div
              class="bg-benefitstemp h-[222px] w-[321px] ml-[5%] rounded-l-lg mt-[45%] text-white px-[24px] py-[24px]"
            >
              <img
                src="./images/map-mark.png"
                alt=""
                class="h-[33px] w-[33px] mb-[1rem]"
              />
              <p class="text-[16px] leading-[18px] mb-[4px] worksansregular">
                Student Diversity from
              </p>
              <p class="text-[24px] leading-[26px] lufgabold max-w-[60%]">
                All 28 Indian <br />
                States and 8 <br />
                Union <br />
                Territories
              </p>
            </div>
          </div>
          <!-- third template -->
          <div
            class="h-full rounded-lg w-full pt-[10%] bg-[url('./images/benefit-bg-3.png')]"
          >
            <div
              class="bg-benefitstemplate h-[222px] w-[321px] ml-[5%] rounded-l-lg mt-[45%] text-white px-[24px] py-[24px]"
            >
              <img
                src="./images/gender.png"
                alt=""
                class="h-[25px] w-[31px] mb-[1rem]"
              />
              <p class="text-[16px] leading-[16px] worksansregular mb-[4px]">
                Ensuring
              </p>
              <p class="text-[24px] leading-[26px] lufgabold max-w-[60%]">
                Inclusivity <br />
                and Equality
              </p>
            </div>
          </div>
          <!-- fourth template -->
          <div
            class="h-full rounded-lg mt-12 w-full pt-[10%] bg-[url('./images/benefit-bg-4.png')]"
          >
            <div
              class="bg-benefitstemp h-[222px] w-[321px] ml-[5%] rounded-l-lg mt-[45%] text-white px-[24px] py-[24px]"
            >
              <img
                src="./images/hallmark.png"
                alt=""
                class="h-[28px] w-[22px] mb-[1rem]"
              />
              <p class="text-[16px] leading-[16px] worksansregular mb-[4px]">
                Hallmark of Academic
              </p>
              <p class="text-[24px] leading-[26px] lufgabold max-w-[60%]">
                Accomplishment <br />
                and Potential
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- section-5 -->
      <section class="mx-[15%] mt-24">
        <!-- header of section-5 -->
        <div class="flex flex-col items-center">
          <h2
            class="text-[30px] leading-[40px] mb-[15px] sansmedium text-center font-bold"
          >
            CHANDIGARH UNIVERSITY
            <div class="text-[42px] leading-[40px]">
              COMMON ENTERANCE TEST (CUCET)
            </div>
          </h2>
          <p
            class="text-[18px] leading-[24px] mb-[20px] text-center worksansregular"
          >
            Chandigarh University Common Entrance Test (CUCET 2024) is a
            national-level entrance exam and scholarship <br />
            test mandatory for admission. CUCET exam forms the basis of
            eligibility that is mandatory for admission in <br />
            Engineering, MBA, Pharmacy, LLM, and Integrated Law programs. The
            amount of the scholarship depends on <br />
            the fee of the program, the date of admission, and the performance
            of the student in CUCET 2024.
          </p>
        </div>
        <!-- templates of setion-5 -->
        <div class="mt-6 flex w-full z-20">
          <!-- first template section-5 -->
          <span
            class="bg-[url('./images/scholarship-big-bg.png')] bg-cover relative rounded-lg bg-no-repeat w-[563.6px] h-[629.5px]"
          >
            <div
              class="overflow-hidden h-full w-full bg-templatecolorbg px-[36px] py-[36px] rounded-lg flex flex-col"
            >
              <h5
                class="mt-24 text-[36px] leading-[36px] lufgaextrabold text-white"
              >
                <span class="text-fontcolorsky">
                  SEIZE YOUR <br />
                  GOLDEN CHANCE <br
                /></span>
                TO EARN <br />
                SCHOLARSHIPS <br />
                WORTH
              </h5>
              <div
                class="bg-[url('./images/crore-bg.png')] mt-[20px] py-[65px] px-[45px] h-[183px] w-[268px]"
              >
                <span
                  class="relative pt-[-90px] text-[116px] leading-[36px] lufga text-white"
                >
                  <sup
                    class="text-[37px] absolute top-[98px] left-[-22px] opensans font-extrabold"
                    >₹</sup
                  >
                  170
                </span>
                <h5
                  class="mt-0 text-[33px] text-center leading-[36px] lufgaextrabold text-white"
                >
                  CRORES
                </h5>
              </div>
              <img
                src="./images/scholar-image.png"
                alt=""
                class="absolute right-[-70px] bottom-0 overflow-hidden"
              />
            </div>
          </span>
          <!-- second+third teamplate container section-5 -->
          <span class="w-[789.05px] h-[629.5px] flex">
            <!-- second template -->
            <span
              class="w-[50%] relative px-[30px] py-[30px] rounded-lg h-[629.5px] bg-university border-[1px] border-bordertemplate"
            >
              <div class="mb-[15px]">
                <h2
                  class="text-[24px] leading-[24px] mb-0 semibold text-deepblue"
                >
                  CUCET Phase-I
                </h2>
                <p class="text-[14px] semibold text-textgrey">
                  October 2023 - June 2024
                </p>
              </div>
              <ul>
                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">90.01 to 100 Marks:</p>
                  <h2 class="text-[18px] semibold">100% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">80 to 90 Marks:</p>
                  <h2 class="text-[18px] semibold">50% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">70 to 79.99 Marks:</p>
                  <h2 class="text-[18px] semibold">40% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">60 to 69.99 Marks:</p>
                  <h2 class="text-[18px] semibold">30% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">50 to 59.99 Marks:</p>
                  <h2 class="text-[18px] semibold">25% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">40 to 49.99 Marks:</p>
                  <h2 class="text-[18px] semibold">15% Scholarship</h2>
                </li>

                <li
                  class="text-textgrey py-[10px] leading-[20px] worksansregular"
                >
                  <p class="text-[14px]">30 to 39.99 Marks:</p>
                  <h2 class="text-[18px] semibold">Eligible</h2>
                </li>
              </ul>
              <button
                class="bg-fontcolorsky mt-8 w-[100%] h-[49px] py-[14px] px-[35px] text-[14px] semibold rounded-lg text-center text-white relative hover:bg-yellowline"
              >
                APPLY NOW
              </button>
            </span>
            <!-- third template -->
            <span
              class="w-[50%] relative px-[30px] py-[30px] rounded-lg h-[629.5px] bg-deepblue border-[1px] border-bordertemplate"
            >
              <div class="mb-[15px]">
                <h2
                  class="text-[24px] leading-[24px] mb-0 semibold text-fontcolorsky"
                >
                  CUCET Phase-II
                </h2>
                <p class="text-[14px] semibold text-white">
                  June 2024 - End of Admission
                </p>
              </div>
              <ul>
                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">90.01 to 100 Marks:</p>
                  <h2 class="text-[18px] semibold">100% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">80 to 90 Marks:</p>
                  <h2 class="text-[18px] semibold">40% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">70 to 79.99 Marks:</p>
                  <h2 class="text-[18px] semibold">30% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">60 to 69.99 Marks:</p>
                  <h2 class="text-[18px] semibold">20% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">50 to 59.99 Marks:</p>
                  <h2 class="text-[18px] semibold">15% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">40 to 49.99 Marks:</p>
                  <h2 class="text-[18px] semibold">10% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">30 to 39.99 Marks:</p>
                  <h2 class="text-[18px] semibold">Eligible</h2>
                </li>
              </ul>
              <div
                class="bg-buttongrey mt-8 w-[100%] h-[49px] py-[14px] px-[35px] text-[14px] semibold rounded-lg text-center text-textlightgrey relative"
              >
                COMING SOON
              </div>
            </span>
          </span>
        </div>

        <!-- Course Box -->
        <div
          class="w-full mt-12 bg-[url('./images/find-course-bg.png')] bg-cover bg-no-repeat p-[50px] rounded-[20px] h-[532px] flex relative"
        >
          <span class="w-[41.66667%]">
            <div>
              <h2
                class="text-white mb-[15px] text-[24px] leading-[36px] semibold"
              >
                FIND YOUR COURSE
              </h2>
              <p
                class="text-[14px] leading-[18px] tracking-tighter sansmedium mb-[30px] text-white"
              >
                Pursue the Futuristic course of your choice. <br />
                Select your Discipline and Program from the list below:
              </p>
            </div>
            <div class="flex flex-col w-full gap-6">
              <input
                type="text"
                placeholder="SELECT DISCIPLINE"
                class="w-[64%] h-[48px] pr-[36px] pl-[15px] bg-[url('./images/caret.png')] bg-no-repeat bg-[length:10px] bg-right bg-y-[50%] text-[15px] worksansregular rounded-md text-textgrey border-[1px] border-textgrey"
              />
              <input
                type="text"
                placeholder="SELECT PROGRAM"
                class="w-[64%] h-[48px] pr-[36px] pl-[15px] bg-[url('./images/caret.png')] bg-no-repeat bg-[length:10px] bg-right bg-y-[50%] text-[15px] worksansregular rounded-md text-textgrey border-[1px] border-textgrey"
              />
            </div>
            <button
              class="bg-fontcolorsky w-[221.63px] hover:border-b-[2px] hover:border-yellowline leading-[20px] mt-[22px] h-[49px] py-[13px] px-[3rem] text-[14px] semibold rounded-md text-center text-white relative hover:bg-buttonyellow hover:text-black"
            >
              VIEW PROGRAM
            </button>
          </span>
          <span class="w-[58.33333%] flex">
            <span
              class="text-white border-r-[1px] border-bordercourse px-[30px] w-[51%]"
            >
              <p
                class="leading-[20px] text-[13px] mt-0 mb-[1rem] worksansregular"
              >
                Following AIT MBA Specialized Programs are <br />
                having different Scholarship slabs. <br />
                <br />
                Please visit the program webpage by clicking <br />
                the links below for more information.
              </p>
              <ul class="text-[17px] leading-[20px] mb-[3rem] worksansregular">
                <li class="mb-[15px] relative text-left">
                  <img
                    src="./images/ext-blue-link.png"
                    alt=""
                    class="bg-no-repeat absolute left-[-34px] w-[21px] h-[21px]"
                  />
                  MBA Banking & Financial Engineering <br />
                  with SBI & Tally
                </li>
                <li class="mb-[15px] relative text-left">
                  <img
                    src="./images/ext-blue-link.png"
                    alt=""
                    class="bg-no-repeat absolute left-[-34px] w-[21px] h-[21px]"
                  />MBA Strategic HR with AON Consulting
                </li>
                <li class="mb-[15px] relative text-left">
                  <img
                    src="./images/ext-blue-link.png"
                    alt=""
                    class="bg-no-repeat absolute left-[-34px] w-[21px] h-[21px]"
                  />MBA Fintech with NSE Academy
                </li>
                <li class="mb-[15px] relative text-left">
                  <img
                    src="./images/ext-blue-link.png"
                    alt=""
                    class="bg-no-repeat absolute left-[-34px] w-[21px] h-[21px]"
                  />MBA - Strategic Human Resources (ITP)
                </li>
                <li class="mb-[15px] relative text-left">
                  <img
                    src="./images/ext-blue-link.png"
                    alt=""
                    class="bg-no-repeat absolute left-[-34px] w-[21px] h-[21px]"
                  />MBA (Applied Finance)
                </li>
              </ul>
              <p class="text-[14px] workssansregular font-semibold">
                <span class="font-bold">NOTE:</span> <br />
                The average outflow of scholarship will be 10%.
              </p>
            </span>
            <span class="relative w-[50%] px-[30px]">
              <h2 class="text-white text-[24px] leading-[24px] semibold">
                AIT MBA Specialized Programs Slabs:
              </h2>

              <ul>
                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">90.01 to 100 Marks:</p>
                  <h2 class="text-[18px] semibold">40% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">80 to 89.99 Marks:</p>
                  <h2 class="text-[18px] semibold">40% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">70 to 79.99 Marks:</p>
                  <h2 class="text-[18px] semibold">30% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">60 to 69.99 Marks:</p>
                  <h2 class="text-[18px] semibold">20% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">50 to 59.99 Marks:</p>
                  <h2 class="text-[18px] semibold">15% Scholarship</h2>
                </li>

                <li class="text-white py-[10px] leading-[20px] worksansregular">
                  <p class="text-[14px]">40 to 49.99 Marks:</p>
                  <h2 class="text-[18px] semibold">10% Scholarship</h2>
                </li>
              </ul>
            </span>
          </span>
        </div>
      </section>

      <div class="h-[100px]"></div>
    </div>
    <script src="./script.js"></script>
  </body>
</html>

