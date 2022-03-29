/**
 * Created by admin on 8/16/2021.
 */

function checkForm(form) // Submit button clicked
{
    form.myButton.disabled = true;
    form.myButton.value = "Please wait...";
    return true;
}

function checkEditForm(form) // Submit button clicked
{
    form.myEditButton.disabled = true;
    form.myEditButton.value = "Please wait...";
    return true;
}
