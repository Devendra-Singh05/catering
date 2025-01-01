<?php
$allitems=DB('menu')->all('id,item,unit');
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form with Icon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ROOT;?>public/css/userindex.css">
    
</head>

<body>

    <div class="container">
        
            <h2 class="text-center">Booking Form</h2>
            <form>
                <!-- General Information Section --><h5 style="font-weight: bold";>General Information</h5>
                 <div class="container"  style="border: 1px solid black; border-radius: 5px;" >
                <div class="form-section">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" class="form-control" placeholder="Enter your mobile number" name="mobile" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" id="place" class="form-control" name="place" placeholder="Enter Place Details" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="select date for booking" class="form-label">Date</label>
                            <input type="date" id="select date for booking"  name="select date for booking" class="form-control" placeholder="select date for booking" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <textarea id="purpose" class="form-control" rows="3" name="purpose" placeholder="Enter the purpose of booking"></textarea>
                    </div>
                </div>
                </div>

                <!-- Item Details Section -->
                 <div id="parentdiv"style=" margin-top: 10px;">
                 <h5 style="font-weight: bold ";>Item Details</h5>
                    <div class="form-section"  style="border: 0.5px solid black; border-radius: 5px;  margin-top: 10px;  padding: 30px;"  id="childdiv1">
                       
                        <div class="row">
                             <div class="col-md-2 mb-3">
                                <label for="item" class="form-label">Select Item</label>
                                <select id="item" name="item[]" class="form-select"  onchange="setPrice(this.value,'<?=ROOT;?>',1)">
                                <option value="" selected disabled >Select an item</option>
                                <?php foreach($allitems as $item){?>
                                <option value="<?=$item['id'];?>"><?=$item['item'];?></option>
                                <?php } ?>
                                 </select>
                            </div>
                        <div class="col-md-2 mb-3" id="dprice1">
                            <label for="price_per_unit" class="form-label" >Price</label>
                             <div class="input-group">
                            <input type="text" id="price_per_unit1" name="price_per_unit[]" class="form-control" placeholder="Price" style="background-color:rgb(214, 214, 214)" readonly disabled>
                            <div class="input-group-append">
                            <span class="input-group-text"></span>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-2 mb-3" >
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" id="qty1" name="qty[]" class="form-control" onkeyup="calprice(this)"  placeholder="Quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="after_discount_price_per_unit" class="form-label">Final Price(Per Unit) </label>
                            <input type="number" id="after_discount_price_per_unit1" name="after_discount_price_per_unit[]" onkeyup="calprice(this)"  class="form-control" placeholder="Final Price" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="discount_per_unit" class="form-label">Discount</label>
                            <input type="number" id="discount_per_unit1" name="discount_per_unit[]"  class="form-control" placeholder="Discount" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" id="total1" name="total[]" class="form-control" placeholder="total" min="1" required>
                        </div>
                    </div>
                </div>
            </div>

          
               <div style="margin-top: 10px;">
                <input type="hidden" id="totnode" value="1">
                <button type="button"  class="btn btn-success" onclick="createNodess('<?=ROOT;?>')">New</button>
               </div>


                <!-- Submit Button -->
                <div class="text-center" style=" margin-top: 10px; ">
                    <button type="submit" style="background-color:rgb(150, 201, 255)"  >
                        <i class="fas fa-paper-plane"></i> Submit Booking
                    </button>
                </div>
            
            </div>
            
            </form>
        </div>


   
</body> 

</html>

 <script>
    function setPrice(id,root,elno){
        
       $.ajax({
           url:root+"menu/loaditem.",
           type: "get",
           data: "id=" + id+"&eleno="+elno,
           success:function(r){
            // alert("success")
            //    dprice.innerHTML = r;
            document.getElementById('dprice'+elno).innerHTML = r;
                      },
                    error:function(e){
                alert("error");
                        
                    }           
       });
    }
    function createNodess(root) {
            totnode.value = Number(totnode.value) + 1;
            const x = childdiv1.cloneNode(true);
            x.children[0].children[1].id = "dprice" + totnode.value;
            let sel = x.children[0].children[0].children[1];
            sel.removeAttribute('onchange', '');

            sel.addEventListener('change', () => {
                setPrice(sel.value, root, totnode.value);
            })
        
        x.id = "childdiv"+totnode.value
        parentdiv.appendChild(x);
        

    }

    function calprice(obj){
        let topnode= obj.parentNode.parentNode.parentNode;
        let item = topnode.children[0].children[0].children[1];

        let price = topnode.children[0].children[1].children[1].children[1];
        let qty = topnode.children[0].children[2].children[1];

        let fp = topnode.children[0].children[3].children[1];

        let dis = topnode.children[0].children[4].children[1];
        let tot = topnode.children[0].children[5].children[1];
        if(price.value){
       if(qty.value && fp.value){
        tot.value=qty.value*fp.value;
       }
    }
    else{
        qty.value=fp.value="";
        alert("First Select Item");
        item.focus();

    }

    }
</script>  