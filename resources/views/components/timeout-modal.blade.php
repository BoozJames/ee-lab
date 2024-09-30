    <!-- Timeout Modal -->
    <div class="modal fade" id="timeoutModal" tabindex="-1" aria-labelledby="timeoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoutModalLabel">Transaction Timeout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="countdownMessage">
                    Your transaction will be canceled in <span id="countdown">10</span> seconds due to inactivity.
                    Please take action to continue.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript code -->
    <script>
        // Variable to hold the timer
        let timeoutTimer;

        // Function to reset the timer and show modal after 30 seconds of inactivity
        function resetTimer() {
            // Clear the previous timer
            clearTimeout(timeoutTimer);

            // Set a new timer for 30 seconds
            timeoutTimer = setTimeout(() => {
                // Display the modal after 30 seconds of inactivity
                $('#timeoutModal').modal('show');

                let seconds = 10; // Initial countdown value in seconds

                // Function to update countdown display
                function updateCountdown() {
                    document.getElementById('countdown').textContent = seconds;
                    if (seconds === 0) {
                        // Redirect user or take necessary action when countdown reaches 0
                        window.location.href = "/";
                        cancelAndRemoveCart();
                    }
                    seconds--;
                }

                // Call updateCountdown function every second
                const countdownInterval = setInterval(updateCountdown, 1000);

                // Function to stop countdown
                function stopCountdown() {
                    clearInterval(countdownInterval);
                }

                // Call stopCountdown function when modal is closed
                $('#timeoutModal').on('hidden.bs.modal', function() {
                    stopCountdown();
                });
            }, 120000); // 30 seconds
        }

        // Call the resetTimer function on page load
        $(document).ready(resetTimer);

        // Event listener to reset the timer on user activity
        $(document).mousemove(resetTimer);
        $(document).keypress(resetTimer);

        // Function to cancel and remove cart
        function cancelAndRemoveCart() {
            // Send AJAX request to remove the cart
            fetch('/cart/destroy', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // If successful, redirect to root URL
                        window.location.href = "/";
                    } else {
                        console.error('Failed to remove cart');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
