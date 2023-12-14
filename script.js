



// show package on hover.
document.querySelector(".show-tour-packages").addEventListener("mouseover", ()=>{
    document.querySelector(".dropdown-content").style.display = "block";
  
})

document.querySelector(".dropdown-content").addEventListener("mouseleave", ()=>{
    document.querySelector(".dropdown-content").style.display = "none";
})

//for textbox hidden and unhidden
const showTextBox=document.getElementById('showTextAreaButton');
const textArea=document.getElementById('own-description');
showTextBox.addEventListener('click',function(){
     textArea.classList.toggle('hidden');  
})

const addTileSelector=(selector)=>{
    const partnerOptions= document.querySelectorAll(selector);
    partnerOptions.forEach((partnerOption)=>{
        partnerOption.addEventListener('click',()=>{
            Array.from(partnerOptions).filter((item)=>{
                return item.className.includes("checked-tile")
                
            }
            )[0]?.classList.toggle('checked-tile')
            partnerOption.classList.toggle('checked-tile');
            
        })
    })
}

addTileSelector('.tiles.partners label');
addTileSelector('.tiles.lodging label');
addTileSelector('.tiles.travel-date label')


let currentStep = 1;
document.querySelector(`.circle1`).style.filter = 'contrast(100%)';
function nextStep(step) {
    if (step < 5) {

        document.querySelector(`.step-${step}`).style.display = 'none';
        document.querySelector(`.step-${step + 1}`).style.display = 'block';
        document.querySelector(`.circle${step+1}`).style.filter = 'contrast(100%)';
        currentStep = step + 1;
    }

    if (currentStep === 5) {
        updateConfirmation();
    }
    
}

function prevStep(step) {
    if (step > 1) {
        document.querySelector(`.step-${step}`).style.display = 'none';
        document.querySelector(`.step-${step - 1}`).style.display = 'block';
        document.querySelector(`.circle${step}`).style.filter = 'contrast(35%)';
        currentStep = step - 1;
    }
}

// Step 1 script

const countryLabelDiv = document.querySelector(".labels");
const step1 = document.querySelector(".step-1");

countryLabelDiv.onclick = (e) => {
    const elem = e.target;
    if (elem.tagName === "LABEL") {
        elem.classList.toggle("country-checked");
    }

    const numberOfCountrySelected = step1.querySelectorAll(".country-checked");
    // Toggle disable of button
    step1.querySelector(".next-btn").classList.toggle("disabled", !(numberOfCountrySelected.length > 0));

}


// Step 2 script

const step2 = document.querySelector(".step-2");
const step2Nextbutton=step2.querySelector(".next-btn");
const activitiesDiv = step2.querySelector(".activities");

activitiesDiv.onclick = () => {
    const allActivity = Array.from(activitiesDiv.querySelectorAll("input[type=checkbox]"));


    const checkedActivity = allActivity.filter((activity) => activity.checked);

    step2Nextbutton.classList.toggle("disabled", !(checkedActivity.length > 0));



}
const ownDescription=step2.querySelector("#own-description");
ownDescription.addEventListener("input",function(){

    step2Nextbutton.classList.toggle("disabled",(ownDescription.innerText.length>0))
});



// Step 3 script

const step3 = document.querySelector(".step-3");
const datePicker=document.querySelector("#date-picker");
const decideLater=document.querySelector(".decide-later-label");
const step3NextBtn = step3.querySelector(".next-btn");
let isChecked = false;
let dateValidate = false;

const isTravellingPartnerSelected = () => {
    const partners = step3.querySelectorAll('.partners > label');
    for (const partner of partners) {
        if (partner.classList.contains('checked-tile')){
            return true;
        }
    }
    return false;
}

step3.querySelector('.partners').onclick = () => {
    if (isChecked && dateValidate){
        step3.disabled = false;
    }
    else{
        
        step3.disabled = true;
    }
}

decideLater.onclick = function(){
    datePicker.value = null;
    isChecked = decideLater.classList.contains("checked-tile");
    step3NextBtn.classList.toggle("disabled", !(isChecked && isTravellingPartnerSelected()));
};

datePicker.onclick = () => {
    decideLater.classList.remove("checked-tile");

}

const date = flatpickr("#date-picker", {
    enableTime: false,
    dateFormat: "Y-m-d",
    minDate: "today",
    mode: "range",
    onClose: (selectedDates) => {
         dateValidate = isTravellingPartnerSelected() && (selectedDates.length === 2 && selectedDates[0].toString() === selectedDates[1].toString());
        step3NextBtn.classList.toggle("disabled", dateValidate);
    }
});


// Step 4 script

const step4 = document.querySelector(".step-4");
try{
step4.querySelector("#adult").oninput = (e) => {

    if (Number(e.target.value) < 0) {
        e.target.value = 0;
    }

    step4.querySelector(".next-btn").classList.toggle("disabled", !(Number(e.target.value) >= 1))
}
}
catch(err){
    console.log("Error")
}





const step5 = document.querySelector(".step-5");
const submitBtn = step5.querySelector(".submit-btn");
const form = document.forms['tailormade-form'];
submitBtn.disabled = true;

const requiredInputFields = [
    step5.querySelector("#full-name"),
    step5.querySelector("#email"),
    step5.querySelector("#phone"),
    step5.querySelector("#nationality"),
    step5.querySelector("#nationality"),
]

const validatePersonalInfo = () =>{

}

requiredInputFields.map( (inputField) =>{
    inputField.onchange = () => {
    const filledInputs = requiredInputFields.filter( (input) =>{
        return input.value.trim().length > 0
    } )

    if (filledInputs.length === requiredInputFields.length){
        submitBtn.disabled = false;
    }
    else{
        submitBtn.disabled = true;
    }
    }
}  )

submitBtn.onclick = (e) => {
    e.preventDefault();

    step5.querySelector(".errormsg").innerText = "*All fields are required!"
    setTimeout(() => {
        step5.querySelector(".errormsg").innerText = ""
    }, 3000)

}