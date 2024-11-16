<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Product</h1>
        <form action="/php-mvc/routes.php?action=store" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input onchange="validateName()" type="text" id="name" name="name" class="form-control" required>
                <p id="nameHelp"> Please enter a name for the product.</p>
            </div>
            <div class="mb-3">
                <label onchange="validatePrice()" for="price" class="form-label">Price:</label>
                <input type="text" id="price" name="price" class="form-control" required>
                <p id="priceHelp"> Please enter a price for the product.</p>
            </div>
            <div class="mb-3">
                <label onchange="validateQuantity()" for="quantity" class="form-label">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
                <p id="quantityHelp">Please enter a quantity for the product.</p>
            </div>
            <div class="mb-3">
                <label onchange="validateImage()" for="image" class="form-label">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>
                <p id="imageHelp"> Please  upload an image for the product.</p>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {

        const nameInput = document.getElementById("name");
        const priceInput = document.getElementById("price");
        const quantityInput = document.getElementById("quantity");
        const imageInput = document.getElementById("image");

        const nameText = document.getElementById("nameHelp");
        const priceText = document.getElementById("priceHelp");
        const quantityText = document.getElementById("quantityHelp");
        const imageText = document.getElementById("imageHelp");
        const allowedExtensions = ["jpg", "jpeg", "png", "webp"];
        const fileExtension = imageInput.value.split(".").pop().toLowerCase();

        nameInput.addEventListener("keyup", function () {
            if (nameInput.value.trim().length < 3) {
                nameText.textContent = "Name must be at least 3 characters long.";
                nameText.classList.add("text-danger");
                isValid = false;
            } else {
                nameText.textContent = "Name looks good.";
                nameText.classList.remove("text-danger");
                nameText.classList.add("text-success");
            }
        });

        priceInput.addEventListener("keyup", function () {
            if (isNaN(priceInput.value) || priceInput.value <= 0) {
                priceText.textContent = "Price must be a positive number.";
                priceText.classList.add("text-danger");
                isValid = false;
            } else {
                priceText.textContent = "Price looks good.";
                priceText.classList.remove("text-danger");
                priceText.classList.add("text-success");
            }
        });

        quantityInput.addEventListener("keyup", function () {
            if (isNaN(quantityInput.value) || quantityInput.value <= 0) {
                quantityText.textContent = "Quantity must be a positive number.";
                quantityText.classList.add("text-danger");
                isValid = false;
            } else {
                quantityText.textContent = "Quantity looks good.";
                quantityText.classList.remove("text-danger");
                quantityText.classList.add("text-success");
            }
        });

        imageInput.addEventListener("keyup", function () {
            if (!allowedExtensions.includes(fileExtension)) {
                imageText.textContent = "Image must be a valid file (JPG, PNG, WEBP).";
                imageText.classList.add("text-danger");
                isValid = false;
            } else {
                imageText.textContent = "Image looks good.";
                imageText.classList.remove("text-danger");
                imageText.classList.add("text-success");
            }
        });
    });

    </script>
</body>

</html>