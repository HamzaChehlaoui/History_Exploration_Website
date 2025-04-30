<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Canceled</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center min-h-screen font-sans">
    <div class="max-w-lg w-full mx-4">
        <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">
            <!-- Alert Icon -->
            <div class="flex justify-center mb-6">
                <div class="rounded-full bg-blue-100 p-3">
                    <div class="rounded-full bg-blue-200 p-3">
                        <div class="rounded-full bg-blue-500 p-4">
                            <i class="fas fa-exclamation text-white text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <h1 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">Payment Canceled</h1>
            <div class="h-1 w-20 bg-blue-500 mx-auto mb-6 rounded-full"></div>

            <p class="text-lg text-gray-700 mb-8">You canceled the payment. You can try again whenever you're ready.</p>

            <!-- Status Box -->
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
                <div class="flex justify-center items-center">
                    <div class="text-center">
                        <p class="text-gray-500 text-sm">Transaction Status</p>
                        <p class="font-medium">No payment has been processed</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center space-x-4">
                <a href="/Stor" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-full hover:bg-gray-300 transition text-center">
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
        console.log('Payment was canceled by the user.');
    </script>
</body>
</html>
