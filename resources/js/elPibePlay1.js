MIN_NAME_LENGTH=0;
MAX_NAME_LENGTH=50;
MAX_COMPANY_LENGTH=50;

function cleanup_errors(input) {
    $(".help-inline", input).remove();
    $(input).removeClass("error");
}

function validate_field(field, validator, error_message) {
    if (!validator(field)) {
        field.closest(".control-group").addClass("error");
        $("<span class='help-inline'>"+error_message+"</span>").appendTo(field.parent());
        return false;
    }
    return true;
}

function validate_form(form) {
     var valid_company = validate_field($("#company",form), function(field) {
        return $.trim(field.val()).length < MAX_COMPANY_LENGTH;
    }, "El nombre del creador debe ser menor a 50 caracteres");

    return valid_company;

}