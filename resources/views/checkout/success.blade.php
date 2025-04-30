<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Order!</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-yellow-50 to-green-50 flex items-center justify-center min-h-screen font-sans">
    <div class="max-w-lg w-full mx-4">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">
            <!-- Success Icon -->
            <div class="flex justify-center mb-6">
                <div class="rounded-full bg-green-100 p-3">
                    <div class="rounded-full bg-green-200 p-3">
                        <div class="rounded-full bg-green-500 p-4">
                            <i class="fas fa-check text-white text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <h1 class="text-3xl md:text-4xl font-bold text-green-600 mb-4">Your Purchase Was Successful!</h1>
            <div class="h-1 w-20 bg-green-500 mx-auto mb-6 rounded-full"></div>

            <p class="text-lg text-gray-700 mb-8">Thank you for your trust. Your order has been successfully processed.</p>

            <!-- Order Info Box -->
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
                <div class="flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-gray-500 text-sm">Order confirmed</p>
                        <p class="font-medium">Your transaction has been processed successfully</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">

                <a href="/Stor" class="inline-block px-6 py-3 bg-green-600 text-white font-medium rounded-full hover:bg-green-700 transition text-center">
                    <i class="fas fa-home mr-2"></i>Back to Store
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-gray-500 text-sm">
            <p>© 2025 Your Company. All rights reserved.</p>
        </div>
    </div>

    <script>
        localStorage.clear();
        console.log('localStorage was cleaned after successful payment.');
    </script>
</body>
</html>
