function modifyUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = {
            Title: title,
            Url: url
        };
        history.pushState(obj, obj.Title, obj.Url);
    }
}

let validator = $('form.form-v').jbvalidator({
    errorMessage: true
});