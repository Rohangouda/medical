$("[ext=first_name]").attr({
    class: "inputeffect",
    type: "text",
    pattern: "^[a-zA-Z ]+$",
    minlength: "1",
    maxlength: "50",
});
$("[ext=last_name]").attr({
    class: "inputeffect",
    type: "text",
    pattern: "^[a-zA-Z ]+$",
    minlength: "1",
    maxlength: "50",
});
$("[ext=ref_by]").attr({
    class: "inputeffect",
    type: "text",
    pattern: "^[a-zA-Z ]+$",
    minlength: "3",
    maxlength: "50",
});
$("[ext=email]").attr({
    // class: "inputeffect",
    type: "email",
    minlength: "4",
    maxlength: "75",
});
// $("[ext=mobile]").attr({"class":"inputeffect", "type":"number", "pattern":"^[6-9][0-9]{9}$", "max":"9999999999", "min":"600000000"});
// $("[ext=mobile]").attr({
//     class: "inputeffect",
//     type: "number",
//     pattern: "^[5][0-9]{10}$",
// });
$("[ext=mobile]").attr({
    // class: "inputeffect",
    type: "number",
    pattern: "[0-9]{10}",
    max: "9999999999",
    min: "6000000000"
});
$("[ext=phone]").attr({
    class: "inputeffect",
    type: "number",
    pattern: "[0-9]{3,10}"
});
$("[ext=age]").attr({
    class: "inputeffect",
    type: "number",
    max: "99",
    min: "1",
});
$("[ext=id_number]").attr({
    class: "inputeffect",
    type: "number",
    max: "99999999999",
    min: "10000000000"
});
$("[ext=url]").attr({ class: "inputeffect", type: "url", maxlength: "100" });
$("[ext=userid]").attr({ class: "inputeffect", type: "text", maxlength: "12", minlength: "12" });
$("[ext=username]").attr({
    class: "inputeffect",
    type: "text",
    maxlength: "25",
    minlength: "4",
});
$("[ext=address]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "6",
    maxlength: "100",
});
$("[ext=description]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "4",
    maxlength: "250",
});
$("[ext=password]").attr({
    class: "inputeffect",
    type: "password",
    maxlength: "25",
    minlength: "6",
});
$("[ext=common]").attr({ class: "inputeffect", type: "text", maxlength: "75" });
$("[ext=doc_comment]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "6",
    maxlength: "200",
});
$("[ext=city]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "3",
    maxlength: "50",
});
$("[ext=country]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "3",
    maxlength: "50",
});
$("[ext=height]").attr({
    class: "inputeffect",
    type: "number",
    min: "30",
    max: "250",
});
$("[ext=blood_pressure]").attr({ class: "inputeffect", type: "text" });
$("[ext=temperature]").attr({
    class: "inputeffect",
    type: "number",
    min: "90",
    max: "110",
});
$("[ext=weight]").attr({
    class: "inputeffect",
    type: "number",
    min: "2",
    max: "50000",
});
$("[ext=pincode]").attr({ class: "inputeffect", type: "number" });
$("[ext=year]").attr({ class: "inputeffect", type: "number" });
$("[ext=aadhaar]").attr({
    class: "inputeffect",
    type: "number",
    max: "999999999999",
    min: "100000000000",
});
$("[ext=pan]").attr({
    class: "inputeffect",
    type: "text",
    pattern: "^[A-Z]{5}[0-9]{4}[A-Z]{1}",
    maxlength: "10",
});
$("[ext=gst]").attr({
    class: "inputeffect",
    type: "text",
    pattern: "^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$",
    size: "14",
});
$("[ext=salary]").attr({
    class: "inputeffect",
    type: "number",
    min: "0",
    max: "100000000",
});
$("[ext=tele_area_code]").attr({
    class: "inputeffect",
    type: "number"
});
$("[ext=course_name]").attr({
    class: "inputeffect",
    type: "text",
});
$("[ext=number]").attr({
    class: "inputeffect",
    type: "number",
});
$("[ext=remark]").attr({
    class: "inputeffect",
    type: "text",
});

$("[ext=otp]").attr({
    class: "inputeffect",
    type: "number",
});
$("[ext=word]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "1",
    maxlength: "250",
});
$("[ext=marks]").attr({
    class: "inputeffect",
    type: "number",
    min: "0",
    max: "100",
    maxlength: "3",
});
$("[ext=mobile_val]").attr({
    class: "inputeffect",
    type: "text",
    minlength: "3",
    maxlength: "10",

});

//theme validation
$("[ext=price]").attr({
    type: "number",
    min: "1",
});

