
function numericInput(evt) {
    let key;
    const theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    const regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

if ($('#id').val() && $('#person_dealing_with_estate').val()==0){
    $(".person_dealing_with_estate").show();
}else{
    $(".person_dealing_with_estate").hide();
}
if ($('#id').val() && $('#is_verify_identity').val()==0){
    $(".identity").hide();
}else{
    $(".identity").show();
}
if ($('#id').val() && $('#available_for_contact').val()==0){
    $(".is_contcated_by_creditor").hide();
    $("#email_available_for_contact").val(0);
    $("#phone_number_available_for_contact").val(0);
    $("#mail_available_for_contact").val(0);
    $("#email_for_contact").removeAttr('checked'); $("#phone_for_contact").removeAttr('checked'); $("#mail").removeAttr('checked');
}else{
    $(".is_contcated_by_creditor").show();
}

const toggleInputContainer = function(input) {
    if (input.value != "") {
        input.classList.add('filled');
    } else {
        input.classList.remove('filled');
    }
}

const labels = document.querySelectorAll('.label');
for (let i = 0; i < labels.length; i++) {
    labels[i].addEventListener('click', function() {
        this.previousElementSibling.focus();
    });
}
function refreshInputs()
{
    const inputs = document.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', function() {
            toggleInputContainer(this);
        });
        toggleInputContainer(inputs[i]);
    }
}
window.addEventListener("load", function() {
    refreshInputs();
});

function toggleCheckbox(id,content = false,selector = null) {
    const temp = $("#"+id).val();
    const new_value = (temp == 1) ? 0 : 1;
    $("#"+id).val(new_value);
    if(content != false && selector != null)
        toggleContent(selector);
    if(id=="available_for_contact"){
        $("#email_for_contact").removeAttr('checked');
        $("#phone_for_contact").removeAttr('checked');
        $("#mail").removeAttr('checked');
        $("#email_available_for_contact").val(0);
        $("#phone_number_available_for_contact").val(0);
        $("#mail_available_for_contact").val(0);
    }
};

function toggleContent(selector) {
    $("."+selector).toggle();
};
