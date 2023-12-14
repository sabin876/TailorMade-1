<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tailor Made</title>

        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="header-part">
            <div class="circle-container">
                <div class="circle circle1">1</div>
                <div class="text-between">Destination</div>
                <div class="circle circle2">2</div>
                <div class="text-between">Preferred Activities</div>
                <div class="circle circle3">3</div>
                <div class="text-between">Travel Detail</div>
                <div class="circle circle4">4</div>
                <div class="text-between">Budget</div>
                <div class="circle circle5">5</div>
                <div class="text-between">Submit</div>
            </div>
        </div>
        <div class="container-fluid container tailormade-container">
            <form id="tailormade-form" name="tailormade-form" class="form" action="./send.php" method="post">

                <div class="step step-1">

                    <!-- Hidden inputs -->
                    <input type="checkbox" name="country[]" id="nepal" value="nepal" class="country hidden">
                    <input type="checkbox" name="country[]" id="bhutan" value="bhutan" class="country hidden">
                    <input type="checkbox" name="country[]" id="tibet" value="tibet" class="country hidden">

                    <!-- Labels -->
                    <div class="labels my-4 d-flex flex-wrap justify-content-center align-items-center">

                        <label for="nepal" class="nepal-label country-label">
                            <img src="./nepal.jpg" width="200px" alt="">
                            <span class="country-text">Nepal</span>
                        </label>
                        <label for="bhutan" class="bhutan-label country-label">
                            <img src="./bhutan.jpg" width="200px" alt="">
                            <span class="country-text">Bhutan</span>
                        </label>
                        <label for="tibet" class="tibet-label country-label">
                            <img src="./tibet.jpg" width="200px" alt="">
                            <span class="country-text">Tibet</span>
                        </label>
                    </div>

                    <div class="buttons text-center my-4">
                        <button type="button"  class="btn btn-primary next-btn disabled" onclick="nextStep(1)">Next</button>
                    </div>

                </div>

                <div class="step step-2">
                    <div class="d-flex flex-row">
                        <div class="activities">
                            <div class="form-check form-switch ">
                                <input class="form-check-input" name="adventure[]" value="trekking" type="checkbox" id="trekking">
                                <label class="form-check-label act-font" for="trekking">Trekking</label>
                            </div>

                            <div class="form-check form-switch ">
                                <input class="form-check-input" name="adventure[]" value="tour" type="checkbox" id="tour">
                                <label class="form-check-label act-font" for="tour">Tour</label>
                            </div>

                            <div class="form-check form-switch ">
                                <input class="form-check-input"  name="adventure[]" value="peak-climbing" type="checkbox" id="peak-climb">
                                <label class="form-check-label act-font" for="peak-climb">Peak Climbing</label>
                            </div>
                        </div>
                    </div>

                    <div class="tour-selection">

                        <div class="d-flex">
                            <div class="drop1 align-self-start ">
                                <button  type="button" class="dropbtn show-tour-packages">
                                    <i class="fa-solid fa-bars" style="color: #095a5b;"></i>
                                    <strong class="text">I want to select a tour package</strong>
                                </button>
                                <div class="dropdown-content">
                                    <a data-tour-id="shivapuri" href="#">Daily Hike to shivpuri National Park</a>
                                    <a href="#">Canyoning Trip in Nepal</a>
                                    <a href="#">Himlung Himal Climbing </a>
                                    <a href="#">Rafting trip to bhote koshi</a>
                                    <a href="#">kanchenjunga circut trek</a>
                                    <a href="#">Manaslu Circuit Trek</a>
                                    <a href="#">Airport Pickup</a>
                                </div>
                                <input type="text"  hidden name="selected-tour">
                            </div>

                            <div class="drop1">
                                <button type="button" id="showTextAreaButton" class="dropbtn">
                                    <i class="fa-regular fa-clipboard" style="color: #154dac;"></i>
                                    <strong class="text">I want to described by preferred tour</strong>
                                </button>

                                <textarea id="own-description" name="own-description"  class="my-2 hidden" rows="5" placeholder="Describe your preference" style="resize: vertical;"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="buttons text-center my-4 ">
                        <button type="button"  class="btn btn-primary prev-btn" onclick="prevStep(2)"  >previous</button>
                        <button type="button"  class="btn btn-primary next-btn disabled" onclick="nextStep(2)">Next</button>
                    </div>
                </div>

                <div class="step step-3">
                    <div class="flex-responsive">

                        <div class="d-flex flex-column">
                            <div class="icon-box2">
                                <div class="icon2">
                                    <i class="fa-solid fa-people-group" style="color: #095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text2">
                                    Who Are you Traveling with?
                                </div>
                            </div>
                        
                            <div class="grid tiles  partners mt-2">

                                <label class="checked-tile" for="solo ">

                                    <i class="fa-solid fa-user" style="color: #095a5b;"></i>
                                    <p>Solo</p>

                                </label>
                                <label for="couple">

                                    <i class="fa-solid fa-user-group" style="color: #095a5b;"></i>
                                    <p>Couple</p>

                                </label>
                                <label for="family">

                                    <i class="fa-solid fa-people-roof" style="color:#095a5b;"></i>
                                    <p>Family</p>

                                </label>
                                <label for="group">

                                    <i class="fa-solid fa-people-group" style="color:#095a5b;"></i>
                                    <p>Group</p>

                                </label>
                                <input type="checkbox" name="travels-with[]" value="solo" id="solo" hidden>
                                <input type="checkbox" name="travels-with[]" value="Family" id="family" hidden>
                                <input type="checkbox" name="travels-with[]" value="couple" id="couple" hidden>
                                <input type="checkbox" name="travels-with[]" value="group" id="group" hidden>
                            </div>
                        </div>

                        <div class="d-flex flex-column">

                            <div class="icon-box3">
                                <div class="icon3">
                                    <i class="fa-solid fa-regular fa-calendar-days" style="color: #095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text3">
                                    Your Travel Date
                                </div>
                            </div>

                            <div class="travel-date tiles">
                                
                                <div class="know-date text-center mt-2">

                                    <strong>
                                        <i class="fa-solid fa-regular fa-calendar-days" style="color: #095a5b;"></i>
                                        I know my date.</strong>
                                    <input type="date" id="date-picker" size="5" name="date-from-to"
                                        placeholder="Choose your starting date...">

                                </div>

                                <label for="decide-later" class="decide-later-label">
                                    <input type="checkbox" value="decide-later" name="decide-later" hidden id="decide-later">
                                    <i class="fa-solid fa-clock-rotate-left" style="color: #095a5b;"></i>
                                    <strong>I will decide later.</strong>
                                </label>

                            </div>

                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="buttons text-center my-4 ">
                        <button type="button"  class="btn btn-primary prev-btn" onclick="prevStep(3)" >Previous</button>
                        <button type="button"  class="btn btn-primary next-btn disabled" onclick="nextStep(3)">Next</button>
                    </div>
                </div>

                <div class="step step-4">
                    <div class="flex-responsive">
                        <div class="d-flex flex-column">
                            <div class="icon-box4">
                                <div class="icon4">
                                    <i class="fa-solid fa-dollar-sign" style="color: #095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text2">
                                    Indicate your total estimated budget
                                </div>
                            </div>
                            <div class="mt-2">
                                <input type="number" min="0" name="est-budget"
                                    placeholder="Enter your estimated budget">
                            </div>


                        </div>
                        <div class="d-flex flex-column">
                            <div class="icon-box5">
                                <div class="icon5">
                                    <i class="fa-regular fa-comment" style="color:#095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text2">
                                    select your preferred lodging type
                                </div>
                            </div>
                            <div class="grid mt-2 tiles lodging">

                                <label for="guesthouse">

                                    <i class="fa-solid fa-house" style="color: #095a5b;"></i>
                                    <p>Guesthouse/Homestay</p>

                                </label>
                                <label for="3-starhotel">

                                    <i class="fa-solid fa-hotel" style="color: #095a5b;"></i>
                                    <p> 3 star Hotel</p>

                                </label>
                                <label for="4-starhotel">

                                    <i class="fa-solid fa-hotel" style="color:#095a5b;"></i>
                                    <p>4 star Hotel</p>

                                </label>
                                <label for="5-starhotel">

                                    <i class="fa-solid fa-hotel" style="color:#095a5b;"></i>
                                    <p>5 star Hotel</p>

                                </label>
                                <input type="checkbox" name="lodge[]" value="guesthouse" id="guesthouse" hidden>
                                <input type="checkbox" name="lodge[]" value="3-starhotel" id="3-starhotel" hidden>
                                <input type="checkbox" name="lodge[]" value="4-starhotel" id="4-starhotel" hidden>
                                <input type="checkbox" name="lodge[]" value="5-starhotel" id="5-starhotel" hidden>
                            </div>

                        </div>

                    </div>
                    <!-- Buttons -->
                    <div class="buttons text-center my-4 ">
                        <button type="button"  class="btn btn-primary prev-btn" onclick="prevStep(4)">Previous</button>
                        <button type="button"  class="btn btn-primary next-btn" onclick="nextStep(4)">Next</button>
                    </div>

                </div>


                <div class="step step-5">
                    <div class="flex-responsive">
                        <div class="d-flex flex-column set-gap">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="fas fa-user-circle" style="color:#095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text">
                                    Personal Details
                                </div>
                            </div>
                            <div>
                                <div class="inputs d-flex set-gap">

                                    <div class="d-flex set-gap">

                                        <input type="radio" class="btn-check" name="title" id="mr" autocomplete="off"
                                            checked>
                                        <label class="btn btn-outline-secondary" for="mr">Mr.</label>

                                        <input type="radio" class="btn-check" name="title" id="mrs" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="mrs">Mrs.</label>

                                        <label for="full-name" hidden>Full Name: </label>
                                        <input type="text" class="personal-info" id="full-name" name="full-name" placeholder="Full name">
                                        <span style="color:red" class="formNameError"></span>
                                    </div>

                                    <label for="email" hidden>Email: </label>
                                    <input type="email" class="personal-info" id="email" name="email" placeholder="Email">
                                    <span style="color:red" class="formEmailError"></span>

                                    <label for="phone" hidden>Phone: </label>
                                    <input type="tel" class="personal-info" id="phone" name="phone-skype" placeholder="Phone/Skype number">

                                    <label for="nationality" hidden>Nationality: </label>
                                    <input type="text" class="personal-info" id="nationality" name="nationality" placeholder="Nationality">

                                    <div class="contact-way my-3 mx-auto ">
                                        <h5>Best way to contact you: </h5>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input contact-way-checkbox" name="contact-via[]" value="email"
                                                type="checkbox" id="via-email" value="email">
                                            <label class="form-check-label" for="via-email">Email</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input contact-way-checkbox" name="contact-via[]" value="phone"
                                                type="checkbox" id="via-phone" value="phone">
                                            <label class="form-check-label" for="via-phone">Phone</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input contact-way-checkbox" name="contact-via[]" value="skype"
                                                type="checkbox" id="via-skype" value="skype">
                                            <label class="form-check-label" for="via-skype">Skype</label>
                                        </div>

                                        <!-- Buttons -->

                                        <strong class="errormsg"></strong>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="d-flex flex-column set-gap">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="fa-regular fa-comment" style="color:#095a5b;"></i>
                                    <!-- Replace with your desired Font Awesome icon -->
                                </div>
                                <div class="text">
                                    Addtional Inofrmation
                                </div>
                            </div>

                            <textarea class="form-control" id="" cols="40"
                                placeholder="Tell us more about you. What you are particularly interested in; anything that can help us help you."
                                rows="5" name="add-info"></textarea>

                            <label for="found-by" hidden>How did you find us?</label>

                            <select class="form-select form-select-lg my-3" name="found-by" id="found-by"
                                aria-label=".form-select-lg example">
                                <option selected disabled>How Did You Find Us?</option>
                                <option value="search engine">Search Engine</option>
                                <option value="friends">Friends</option>
                                <option value="facebook">Facebook</option>
                                <option value="trip advisor">Trip Advisor</option>
                            </select>


                        </div>


                    </div>

                    <!-- Buttons -->
                    <div class="buttons text-center my-4 ">
                        <button type="button"  class="btn btn-primary prev-btn" onclick="prevStep(5)"  >previous</button>
                        <button type="submit" class="btn btn-success submit-btn" name="send">submit</button>
                    </div>

                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script src="script.js"></script>


    

    </body>
    

</html>

