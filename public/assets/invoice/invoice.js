$(document).on("keypress",'.discount', function (event) {
    return isNumber(event, this)
});
$(document).on("keypress",'.amount', function (event) {
    return isNumber(event, this)
});
$(document).on("keypress",'.quantity', function (event) {
    return isNumber(event, this)
});
$(document).on("keypress",'.price', function (event) {
    return isNumber(event, this)
});

$(document).on("keypress",'.total', function (event) {
    return isNumber(event, this)
});

$(document).on("keypress",'.cashPaid', function (event) {
    return isNumber(event, this)
});

////////////////// accept number function ////////////////
function isNumber(evt, element) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (
        (charCode !== 46 || $(element).val().indexOf('.') !== -1) &&      // “.” CHECK DOT, AND ONLY ONE.
        (charCode < 48 || charCode > 57))
        return false;
    return true;
}
//////////////// end of accept number function //////////////

//////////////////////// Add price ///////////
$(document).on("keyup",'.price', function () {
    var Currentrow = $(this).closest("tr");
        var Total = parseFloat(Currentrow.find('.price').val());
        Currentrow.find('.total').val(Total);
    var vat = Currentrow.find('.VAT').val();
    var discount = Currentrow.find('.discount').val();
    RowSubTalSubtotal(vat, discount, Currentrow);
    CountTotalVat();
});
////////// end of add price /////////////////

//////////////////////// Add quantity ///////////
$(document).on("keyup",'.total', function () {
    var Currentrow = $(this).closest("tr");
    var tl = $(this).val();
        Currentrow.find('.total').val(tl);
    var vat = Currentrow.find('.VAT').val();
    var discount = Currentrow.find('.discount').val();
    RowSubTalSubtotal(vat, discount, Currentrow);
    CountTotalVat();
});
///////// end of add quantity ///////////////////

/////// vat //////////////////
$(document).on("change", '.VAT', function () {
    var Currentrow = $(this).closest("tr");
    var vat = Currentrow.find('.VAT').val();
    var discount = Currentrow.find('.discount').val();
    RowSubTalSubtotal(vat, discount, Currentrow);
    CountTotalVat();

});
////////////// end of vat /////////////////

/////// vat //////////////////
$(document).on("keyup", '.VAT', function () {
    var Currentrow = $(this).closest("tr");
    var vat = Currentrow.find('.VAT').val();
    var discount = Currentrow.find('.discount').val();
    RowSubTalSubtotal(vat, discount, Currentrow);
    CountTotalVat();

});
////////////// end of vat /////////////////

///// row Sub Total ///////////////////////
function RowSubTalSubtotal(vat, discount, CurrentRow) {

    Total = 0;
    Total = CurrentRow.find('.total').val();
    if (parseInt(vat) === 0 && typeof (vat) != "undefined" && vat !== ""){
        if (!isNaN(Total) && typeof (Total) != "undefined")
        {
            var ValueWTVd =  parseFloat(Total) - discount;
            CurrentRow.find('.totalD').val(parseFloat(ValueWTVd).toFixed(2));
            if (!isNaN(ValueWTVd)) {
                CurrentRow.find('.rowTotal').val(parseFloat(ValueWTVd).toFixed(2));
            }
            return;
        }
    }

    if (!isNaN(Total) && Total !== "" && typeof (vat) != "undefined")
    {
        var ValueWTVdv =  parseFloat(Total) - discount;
        CurrentRow.find('.totalD').val(parseFloat(ValueWTVdv).toFixed(2));
        var InputVatValue = parseFloat((ValueWTVdv / 100) * vat);
        var ValueWTV = parseFloat(InputVatValue) + parseFloat(ValueWTVdv);
        if (!isNaN(ValueWTV))
        {
            CurrentRow.find('.rowTotal').val(parseFloat(ValueWTV).toFixed(2));
        }
        CurrentRow.find('.singleItemVat').val(parseFloat(InputVatValue).toFixed(2));
    }
}
/////////////// end of row sub total ///////////////////////////


//////////// total vat /////////////////
function CountTotalVat() {
    var TotalVat = 0;
    var Gtotal = 0;
    var ToatWTVAT = 0;
    var totalDiscount = 0;
    $('#newRow tr').each(function () {
        if ($(this).find(".rowTotal").val().trim() != ""){
            Gtotal = parseFloat(Gtotal) + parseFloat($(this).find(".rowTotal").val());
        }
        else {
            Gtotal = parseFloat(Gtotal);
        }
        if ($(this).find(".totalD").val().trim() != ""){
            ToatWTVAT = parseFloat(ToatWTVAT) + parseFloat($(this).find(".totalD").val());

            var totalDis = parseFloat($(this).find(".total").val()) - parseFloat($(this).find(".totalD").val());
            totalDiscount = parseFloat(totalDiscount) + parseFloat(totalDis);
        }
        else {
            ToatWTVAT = parseFloat(ToatWTVAT);
        }
        TotalVat = parseFloat(Gtotal) - parseFloat(ToatWTVAT);
    });

    if (!isNaN(totalDiscount)) {
        $('#totalDiscount').text(totalDiscount.toFixed(2));
        $('.totalDiscount').val(totalDiscount.toFixed(2));
    }

    if (!isNaN(TotalVat)){
        $('#TotalVat').text(TotalVat.toFixed(2));
        $('.TotalVat').val(TotalVat.toFixed(2));
    }

    if (!isNaN(ToatWTVAT)){
        $('#SubTotal').text(ToatWTVAT.toFixed(2));
        $('.SubTotal').val(ToatWTVAT.toFixed(2));
    }

    $('#GTotal').text((Gtotal.toFixed(2)));
    $('.GTotal').val((Gtotal.toFixed(2)));

    $('.balance').val(Gtotal - $('.cashPaid').val());
}
//////////////// end of total vat /////////////

$(document).on("keyup",'.cashPaid',function () {
    var GTotal = $('.GTotal').val();
    var Input = parseFloat(GTotal - $('.cashPaid').val());
    var rr= $('.balance').val((Input.toFixed(2)));
});

/////// discount //////////////////
$(document).on("keyup", '.discount', function () {
    var CurrentRow = $(this).closest("tr");
    var vat = CurrentRow.find('.VAT').val();
    var discount = CurrentRow.find('.discount').val();
    RowSubTalSubtotal(vat, discount, CurrentRow);
    CountTotalVat();
});
///////////// end of discount ////////////


    function totalWithCustomer(vat, rate)
    {
         var QTY = $('.quantity').val();
         if (parseInt(QTY) >= 0)
         {
             var Total = parseInt(QTY) * parseFloat(rate);
             $('.total').val(Total);
         }

          Total = 0;
          Total = $('.total').val();
          var InputVatValue = parseFloat((Total / 100) * vat);
          var ValueWTV = parseFloat(InputVatValue) + parseFloat(Total);
          $('.rowTotal').val(parseFloat(ValueWTV).toFixed(2));
          $('.singleRowVat').val(parseFloat(InputVatValue).toFixed(2));
          CountTotalVat();
    }


//////// validate rows ////////
function validateRow(currentRow) {
    var isvalid = true;
    var price = 0, vehicle = 0, startReading = 0, classificationName, classificationDesc,galleryImages;
    vehicle = currentRow.find('.vehicle_id').val();
     classificationName = currentRow.find('.classificationName').val();
     classificationDesc = currentRow.find('.classificationDesc').val();
     galleryImages = currentRow.find('.galleryImages').val();
    price  = currentRow.find('.price').val();
    if (parseInt(classificationName) === 0 || classificationName === ""){
        isvalid = false;

    }

    if (parseInt(vehicle) === 0 || vehicle === ""){
        isvalid = false;

    }
    if (parseInt(price) == 0 || price == "")
    {
        isvalid = false;
    }
    if (parseInt(classificationDesc) === 0 || classificationDesc === ""){
            isvalid = false;

        }
    if (parseInt(galleryImages) === 0 || galleryImages === ""){
            isvalid = false;

        }

    // if (parseInt(endReading) == 0 || endReading == "")
    // {
    //     isvalid = false
    // }
    return isvalid;
}
////// end of validate row ///////////////////
