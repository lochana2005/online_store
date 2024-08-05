

function changeview() {

    var signUpBox = document.getElementById("signup");
    var signInBox = document.getElementById("signin");

    signUpBox.classList.toggle('d-none');
    signInBox.classList.toggle('d-none');

}

function signup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("mobile", mobile.value);
    form.append("email", email.value);
    form.append("password", password.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                document.getElementById("errorMsg2").innerHTML = resp;
                document.getElementById("errorMsgDiv2").classList.remove("d-none");
            }
        }
    }
    req.open("POST", "signup-process.php", true);
    req.send(form);
}

function signin() {

    var email = document.getElementById("em");
    var password = document.getElementById("pw");
    var rememberMe = document.getElementById("rmb");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location = "index.php";
            } else {
                alert(resp);
                // alert code
            }
        }
    }

    req.open("POST", "signin-process.php", true);
    req.send(form);
}

function forgotPassword() {

    var loader = document.getElementById("loader");
    var btnText = document.getElementById("btnText");
    var email = document.getElementById("email");

    loader.classList.remove("d-none");
    btnText.classList.add("d-none");

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            loader.classList.add("d-none");
            btnText.classList.remove("d-none");

            var resp = req.responseText;
            alert(resp);
        }
    }
    req.open("GET", "forgot-password-process.php?email=" + email.value, true);
    req.send();

}

function resetPassword() {
    var pw = document.getElementById("pw");
    var cpw = document.getElementById("cpw");
    var vcode = document.getElementById("vcode");

    var form = new FormData();
    form.append("pw", pw.value);
    form.append("cpw", cpw.value);
    form.append("vcode", vcode.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
        }
    }
    req.open("POST", "reset-password-process.php", true);
    req.send(form);
}

function adminSignIn() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            resp = req.responseText;
            if (resp == "success") {
                window.location = "admin-dashboard.php";
            } else {
                document.getElementById("msg").innerHTML = resp;
                document.getElementById("msgDiv").className = "d-block mt-3";
            }
        }
    }

    req.open("POST", "admin-signin-process.php", true);
    req.send(form);

}

function loadUsers(page) {

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            document.getElementById("content").innerHTML = resp;
        }
    }
    req.open("GET", "load-users-process.php?page=" + page, true);
    req.send();

}

function changeUser(id, status, page) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.status == 200 && req.readyState == 4) {
            var resp = req.responseText;
            if (resp == "success") {
                loadUsers(page);
            } else {
                alert(resp);
            }
        }
    }
    req.open("GET", "change-user-status-process.php?id=" + id + "&s=" + status, true);
    req.send();
}

function registerBrand() {
    var brand = document.getElementById("brandName");

    var form = new FormData();
    form.append("brand", brand.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("POST", "register-brand-process.php", true);
    req.send(form);
}

function registerCat() {

    var cat = document.getElementById("catName");

    var form = new FormData();
    form.append("cat", cat.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("POST", "register-cat-process.php", true);
    req.send(form);

}

function registerColor() {

    var color = document.getElementById("colorName");

    var form = new FormData();
    form.append("color", color.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("POST", "register-color-process.php", true);
    req.send(form);

}

function registerSize() {

    var size = document.getElementById("size");

    var form = new FormData();
    form.append("size", size.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("POST", "register-size-process.php", true);
    req.send(form);

}

function registerProduct() {
    var name = document.getElementById("prodName");
    var desc = document.getElementById("prodDesc");
    var category = document.getElementById("prodCategory");
    var brand = document.getElementById("prodBrand");
    var color = document.getElementById("prodColor");
    var size = document.getElementById("prodSize");
    var image = document.getElementById("prodImage");

    var form = new FormData();
    form.append("name", name.value);
    form.append("desc", desc.value);
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("img", image.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
        }
    }

    req.open("POST", "register-product-process.php", true);
    req.send(form);

}

function loadProducts(page) {

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            resp = req.responseText;
            document.getElementById("content").innerHTML = resp;
        }
    }

    req.open("GET", "load-product-process.php?page=" + page, true);
    req.send();

}

function changeProductStatus(id) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("GET", "change-product-status-process.php?id=" + id, true);
    req.send();
}

function addStock() {
    var product = document.getElementById("product");
    var qty = document.getElementById("qty");
    var price = document.getElementById("unitPrice");

    var form = new FormData();
    form.append("product", product.value);
    form.append("qty", qty.value);
    form.append("price", price.value);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                showAlert("Success", "Stock Updated Successfully!", "success").then(() => (window.location.reload()));
            } else {
                showAlert("Error", resp, "error");
            }
        }
    }
    req.open("POST", "add-stock-process.php", true);
    req.send(form);
}


function showAlert(title, text, icon) {
    return swal.fire({
        title: title,
        text: text,
        icon: icon
    });
}

function loadProdUpdateData(id) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            var data = JSON.parse(resp);

            document.getElementById("uProdId").value = data.id;
            document.getElementById("uProdName").value = data.name;
            document.getElementById("uProdDesc").value = data.description;
            document.getElementById("uProdCategory").value = data.cat_id;
            document.getElementById("uProdBrand").value = data.brand_id;
            document.getElementById("uProdColor").value = data.color_id;
            document.getElementById("uProdSize").value = data.size_id;
            document.getElementById("uProdImageTag").src = data.img;

            new bootstrap.Modal(document.getElementById("updateProductModal")).show();
        }
    }
    req.open("GET", "get-product-details.php?id=" + id, true);
    req.send();
}

function updateProdImage() {
    var image = document.getElementById("uProdImage");
    var imageTag = document.getElementById("uProdImageTag");

    var url = window.URL.createObjectURL(image.files[0]);
    imageTag.src = url;
}

function updateProduct() {
    var id = document.getElementById("uProdId");
    var name = document.getElementById("uProdName");
    var desc = document.getElementById("uProdDesc");
    var cat = document.getElementById("uProdCategory");
    var brand = document.getElementById("uProdBrand");
    var size = document.getElementById("uProdColor");
    var color = document.getElementById("uProdSize");
    var image = document.getElementById("uProdImage");

    var form = new FormData();
    form.append("id", id.value);
    form.append("name", name.value);
    form.append("desc", desc.value);
    form.append("cat", cat.value);
    form.append("brand", brand.value);
    form.append("size", size.value);
    form.append("color", color.value);
    form.append("img", image.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                showAlert("Success", "Product Update Successfully", "success").then(() => (window.location.reload()));
            }
        }
    }
    req.open("POST", "update-product-process.php", true);
    req.send(form);
}

function printReport() {
    var original = document.body.innerHTML;
    var printArea = document.getElementById("printArea");

    document.body.innerHTML = printArea.innerHTML;

    window.print();

    document.body.innerHTML = original;
}

function search(page) {

    var search = document.getElementById("search");
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            console.log(resp);
            document.getElementById("content").innerHTML = resp;
        }
    }
    req.open("GET", "search-products-process.php?search=" + search.value + "&page=" + page, true);
    req.send();
}

function filter(page) {
    var category = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var color = document.getElementById("color");
    var priceFrom = document.getElementById("priceFrom");
    var priceTo = document.getElementById("priceTo");
    var search = document.getElementById("search");

    var form = new FormData();
    form.append("category", category.value);
    form.append("brand", brand.value);
    form.append("size", size.value);
    form.append("color", color.value);
    form.append("priceFrom", priceFrom.value);
    form.append("priceTo", priceTo.value);
    form.append("search", search.value);
    form.append("page", page);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            document.getElementById("content").innerHTML = resp;
        }
    }
    req.open("POST", "filter-product-process.php", true);
    req.send(form);

}

function updateProfileImg() {
    var profileImg = document.getElementById("profileImg");

    var form = new FormData();
    form.append("img", profileImg.files[0]);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                window.location.reload();
            } else {
                alert(resp);
            }
        }
    }
    req.open("POST", "upload-profile-img-process.php", true);
    req.send(form);
}

function updateProfile() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mobile = document.getElementById("mobile").value;
    var no = document.getElementById("fname").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;
    var pcode = document.getElementById("pcode").value;

    var form = new FormData();
    form.append("fname", fname);
    form.append("lname", lname);
    form.append("mobile", mobile);
    form.append("no", no);
    form.append("line1", line1);
    form.append("line2", line2);
    form.append("city", city);
    form.append("pcode", pcode);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
            // if (resp == "success") {
            //     window.location.reload();
            // } else {
            //     alert(resp);
            // }
        }
    }
    req.open("POST", "update-user-profile-process.php", true);
    req.send(form);

}

function addToCart(stock) {
    document.getElementById("qty");

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
        }
    }
    req.open("GET", "add-to-cart-process.php?stock=" + stock + "&qty=" + qty.value, true);
    req.send();
}

function loadCart() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            document.getElementById("content").innerHTML = resp
        }
    }
    req.open("GET", "load-cart-process.php", true);
    req.send();
}

function removeFromCart(cartId) {

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                showAlert("Success", "Cart Item Removed Successfully!", "success").then(loadCart);

            } else {
                showAlert("Error", resp, "error");
            }
        }
    }
    req.open("GET", "remove-from-cart-process.php?id=" + cartId, true);
    req.send();

}

function incrementCartQty(cartId) {

    var qty = document.getElementById("qty-" + cartId);

    var newQty = parseInt(qty.value) + 1;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            if (resp == "success") {
                loadCart();
            } else {
                showAlert("Error", resp, "error");
            }
        }
    }
    req.open("GET", "update-cart-qty-process.php?id=" + cartId + "&qty=" + newQty, true);
    req.send();

}

function decrementCartQty(cartId) {

    var qtyE = document.getElementById("qty-" + cartId);
    var qty = parseInt(qtyE.value);

    if (qty <= 1) {
        showAlert("Warning", "Quantity must be at least 1", "warning");
    } else {
        var newQty = qty - 1;

        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState == 4 && req.status == 200) {
                var resp = req.responseText;
                if (resp == "success") {
                    loadCart();
                } else {
                    showAlert("Error", resp, "error");
                }
            }
        }
        req.open("GET", "update-cart-qty-process.php?id=" + cartId + "&qty=" + newQty, true);
        req.send();
    }

}

function loadChart() {

    var chart1 = document.getElementById("chart1");

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            var json = JSON.parse(resp);

            console.log(json);

            new Chart(chart1, {
                type: 'pie',
                data: {
                    labels: json.labels,
                    datasets: [{
                        label: '# of Quantities',
                        data: json.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    }
    req.open("GET", "load-chart-process.php", true);
    req.send();
}

function checkout() {

    var form = new FormData();
    form.append("cart", true);

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var json = req.responseText;
            var resp = JSON.parse(json);
            if (resp.status == "success") {
                doCheckout(resp.payment, "checkout-process.php")
            } else {
                showAlert("Warning", resp.error, "warning");
            }
        }
    }
    req.open("POST", "payment-process.php", true);
    req.send(form);
}

function doCheckout(payment, url) {

    payhere.onCompleted = function onCompleted(orderId) {

        showAlert("Success", "Payment completed. OrderID:" + orderId, "success");

        var form = new FormData();
        form.append("payment", JSON.stringify(payment));

        var req = new XMLHttpRequest();
        req.onreadystatechange = function name() {
            if (req.readyState == 4 && req.status == 200) {
                var json = req.responseText;
                console.log(json);
                var resp = JSON.parse(json);

                if (resp.status == "success") {
                    showAlert("Success", "Order Success!", "success").then(() => {
                        // Redirect to invoice
                    })
                } else {
                    showAlert("Error", resp.error, "error");
                }
            }
        }
        req.open("POST", url, true);
        req.send(form);

    };

    payhere.onDismissed = function onDismissed() {
        showAlert("Warning", "Payment dismissed", "warning");
    };

    payhere.onError = function onError(error) {
        showAlert("Error", error, "error");
    };

    payhere.startPayment(payment);

}

function buyNow(stockId) {
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var form = new FormData();
        form.append("cart", false);
        form.append("stockId", stockId);
        form.append("qty", qty.value);

        var req = new XMLHttpRequest();
        req.onreadystatechange = function name() {
            if (req.readyState == 4 && req.status == 200) {
                var json = req.responseText;
                var resp = JSON.parse(json);

                if (resp.status == "success") {
                    resp.payment.stock_id = stockId;
                    resp.payment.qty = qty.value;
                    doCheckout(resp.payment, "buy-now-process.php")
                } else {
                    showAlert("Warning", resp.error, "warning");
                }
            }
        }
        req.open("POST", "payment-process.php", true);
        req.send(form);

    } else {
        showAlert("Warning", "Quantity cannot be less than 1", "warning");
    }
}