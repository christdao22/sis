<?php
$form_error = 0;
$err_array = array(
    "Error: This field is required *<br>",
    "Error: No Numbers and Special Characters are Allowed *<br>",
    "Error: Invalid Number *<br>",
    "Error: Too short *<br>",
    "Error: This should not start with Special Character *<br>",
    "Error: This should not start with a Number *<br>",
    "Error: Input should not contain html tag *<br>",
    "Error: Invalid Email *<br>",
    "Error: Invalid Year Level *<br>",
    "Error: Username is already taken *<br>",
    "Error: Username is not valid! *<br>",
    "Error: Password not match! *<br>",
    "Error: Password is not valid! *<br>",
    "Error: Please select *<br>",
);



// ****************************************************************************************************************
//VALIDATION
// validate the input
function validateInput($str = null)
{
    if (isEmpty($str)) {
        form_error_indicator();
        return 1;
    } else if (isStartWithNumber($str)) {
        form_error_indicator();
        return 6;
    } else if (isNotLetterAndWhiteSpaces($str)) {
        form_error_indicator();
        return 2;
    } else if (isContainHtmlTag($str)) {
        form_error_indicator();
        return 7;
    } else if (isStartWithSpecialChar($str)) {
        form_error_indicator();
        return 5;
    }
}

// validate the number
function validateNumber($str = null)
{
    global $contact_Number;
    if (isEmpty($str)) {
        form_error_indicator();
        return 1;
    } else if (isNotCorrectLengthAndType($str)) {
        form_error_indicator();
        return 3;
    } else if (isContainHtmlTag($str)) {
        form_error_indicator();
        return 7;
    }
}

//validate fname/lnameinput length
function validateInputName($str = null)
{
    if (isEmpty($str)) {
        form_error_indicator();
        return 1;
    } else if (isStartWithNumber($str)) {
        form_error_indicator();
        return 6;
    } else if (isStartWithSpecialChar($str)) {
        form_error_indicator();
        return 5;
    } else if (isNotLetterAndWhiteSpaces($str)) {
        form_error_indicator();
        return 2;
    } else if (isContainHtmlTag($str)) {
        form_error_indicator();
        return 7;
    } else if (isCorrectLen($str)) {
        form_error_indicator();
        return 4;
    }
}

//validate address
function validateAddress($str = null)
{
    if (isEmpty($str)) {
        form_error_indicator();
        return 1;
    } else if (isStartWithSpecialChar($str)) {
        form_error_indicator();
        return 5;
    } else if (isContainHtmlTag($str)) {
        form_error_indicator();
        return 7;
    }
}

//validate email
function validateEmail($str = null)
{
    if (isEmpty($str)) {
        form_error_indicator();
        return 1;
    } else if (isEmailValid($str)) {
        form_error_indicator();
        return 8;
    } else if (isContainHtmlTag($str)) {
        form_error_indicator();
        return 7;
    }
}

//validate Year level and Course
function validateSelect($str = null)
{
    if ($str == "default") {
        form_error_indicator();
        return 14;
    }
}

//validate School Year
function validateSchoolYear($str1 = null, $str2 = null)
{
    if (isEmpty($str1)) {
        form_error_indicator();
        return 1;
    } else if (isEmpty($str2)) {
        form_error_indicator();
        return 1;
    } else if (isContainHtmlTag($str1)) {
        form_error_indicator();
        return 7;
    } else if (isContainHtmlTag($str1)) {
        form_error_indicator();
        return 7;
    } else if (isSchoolYearValid($str1, $str2)) {
        form_error_indicator();
        return 9;
    }
}
function dob($dob = null)
{
    return date_format(date_create_from_format('Y-m-d', $dob), 'm-d-Y');
}

function form_error_indicator()
{
    global $form_error;
    $form_error = 1;
}


// ****************************************************************************************************************
function isEmpty($val = null)
{
    return (strlen(trim($val)) <= 0) ? true : false;
}

function isNotLetterAndWhiteSpaces($val = null)
{
    return (!preg_match("/^[a-zA-Z ]*$/", $val)) ? true : false;
}

function isNotCorrectLengthAndType($val = null)
{
    return (!is_numeric($val) || (substr($val, 0, 1) != '9')) ? true : false;
}

function isLenLessthanTwo($val = null)
{
    return strlen($val) <= 2 ? true : false;
}

function isStartWithSpecialChar($val = null)
{
    return preg_match('/[^a-zA-Z\d]/', substr($val, 0, 1)) ? true : false;
}

function isStartWithNumber($val = null)
{
    return is_numeric(substr($val, 0, 1)) ? true : false;
}

function isContainHtmlTag($val)
{
    return preg_match("/<[^<]+>/", $val, $m) != 0 ? true : false;
}

function isEmailValid($val = null)
{
    return !preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $val) ? true : false;
}

function isSchoolYearValid($int1 = null, $int2 = null)
{
    return (is_numeric($int1) && is_numeric($int2) && ($int2 - $int1) == 1) ? false : true;
}

function isCorrectLen($str = null)
{
    return strlen($str) <= 2 ? true : false;
}
