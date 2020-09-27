function ShowMaskError(arg)
{
    if( arg != '') dispError(false);

    dispError(true)
}

function dispError(arg)
{
    document.getElementsByClassName('error').style.visibility = arg == true ? 'visible' : 'hidden'
}

window.onload = dispError(true)