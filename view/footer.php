<footer>
        <section class="mainFooter">
            <section class="mainFooter1">
                <div class="subscribe_category">
                    
                    <div class="category">
                        <!-- <h3>Quick Links</h3> -->
                        <div class="categories">
                            <li><a href="view/contact.php">Contact us</a></li>
                            <li><a href="../admin/index.php" title="Become a seller on Clozeth">Open an online store</a></li>
                            <li><a href="view/contact.php" title="Report a product">Report a product</a></li>
                            <li><a href="view/terms.php" title="Terms and conditions">Terms & conditions</a></li>
                            <li><a href="view/terms.php" title="Clozeth help">Help center</a></li>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <div class="socialLinks">
            <a target="_blank" href="#" title="Follow Clozeth on facebook" style="color:#4267B2"><i class="fab fa-facebook-square"></i></a>
            <a target="_blank" href="#" title="Follow Clozeth on twitter" style="color:#1DA1F2"><i class="fab fa-twitter-square"></i></a>
            <a target="_blank" href="#" title="Follow Clozeth on instagram" style="color:#cd486b"><i class="fab fa-instagram-square"></i></a>
            <a target="_blank" href="#" title="Follow Clozeth on Linkedin" style="color:#0072b1"><i class="fab fa-linkedin"></i></a>
            <!-- <a target="_blank" href="#" title="Join us on whatsapp" style="color:#25D366"><i class="fab fa-whatsapp"></i></a> -->
        </div>
        <section class="secondaryFooter">
            <p>&copy;<?php echo date("Y")?> Clozeth. All Rights Reserved.</p>
        </section>
    </footer>

    
    <div class="toTop">
        <a href="#banner" title="Go to top"><i class="fas fa-chevron-up"></i></a>
    </div>
    <script>
        /* show help center notes */
        function showHelp(notes){
            document.querySelectorAll('.help_details').forEach(div =>{
                div.style.display = "none";
            });
            /* document.querySelectorAll('.help_link').forEach(links =>{
                links.onclick = function(){
                    links.classList.add("active_help");
                }
            }); */
            document.querySelector(`#${notes}`).style.display = "block";

        }
        //make links clickable to get to its respective page
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".help_link").forEach(helps => {
                helps.onclick = function(){
                    // helps.classList.add('.active_help');
                    showHelp(this.dataset.page);
                }
            })
        })


        /* show frequenty asked questions */
        function showFaq(faq){
            //hide all pages when one displays
            // page.preventDefault();
            document.querySelectorAll('.faq_notes').forEach(div =>{
                div.style.display = "none";
            });
            document.querySelector(`#${faq}`).style.display = "block";
            document.querySelectorAll('.faqs i').forEach(arrows =>{
                arrows.innerHTML = "<i class='fas fa-chevron-up></i>'";
            })

        }
        //make links clickable to get to its respective page
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".faqs").forEach(faqs => {
                faqs.onclick = function(){
                    showFaq(this.dataset.page);
                }
            })
        })
    </script>
    