<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="css/abouttemple.css">
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/css/foundation.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <!-- Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.4/dist/js/foundation.min.js">
    </script>
   
    <title>Document</title>
</head>

<body style="background-attachment: fixed;
background-size: cover;
background-position: center;
overflow: auto;
height: 100%;

 background-image: url(assets/Picsart_23-09-05_12-40-43-186.png);" >
    <div id="nav-placeholder">

    </div>
    
    
        <div style="display: flex; justify-content: center;">
        <div style="display: flex; justify-content: center;" class="multi-button">
        <button onclick="document.location='aboutus.php'">About us</button>
        <button onclick="document.location='abouttemple.php'">About Temple</button></div>
        </div>
        <div style="display: flex; justify-content: center;">

            <main>
                <section class="about-section">
                    <h2 class="head1">About Ambrenath shiv mandir</h2>
                    <div style="justify-content: center ; display: flex;">
                        <button
                            style="width: 160px; margin-right: 2px; background-color: black; color: aliceblue; height: 50px;"
                            id="translateButton">Translate to Hindi</button>
                        <button style="width: 160px; background-color: black; color: aliceblue; height: 50px;"
                            id="translateButton1">Translate to English</button>
                       
                    </div>
                    <div class="temple-info">
                        <div class="temple-image">
                            <img src="assets/98197599.webp" alt="Temple Image">

                        </div>
                        <div class="temple-details">

                            <p class="info" id="p1">The Shiv Mandir of Ambarnath is a historic 11th-century Hindu
                                temple,
                                still
                                worshipped , at
                                Ambarnath near Mumbai, in Maharashtra, India. It is also known as the Ambreshwar Shiva
                                Temple, and known locally as Puratana Shivalaya. It is situated on the bank of vrindawan
                                Waldhuni river, 2 km away from Ambarnath railway station (East). The temple was built in
                                1060 AD beautifully carved in stone. It was probably built by Shilahara king
                                Chhittaraja,
                                it may also have been rebuilt by his son Mummuni.</p>


                        </div>
                    </div>
                    <div class="temple-info">
                        <div class="temple-details">

                            <p class="info" id="p2">Unusually, the sanctuary or garbhagriha is below ground, reached by
                                some
                                20
                                steps down from
                                the mandapa, and is open to the sky as the shikhara tower above stops abruptly at a
                                little
                                above the height of the mandapa, and was apparently never completed. It is in bhumija
                                form,
                                and if completed would have been close in form to the Udayesvara Temple also known as
                                Neelkantheshwara temple in Udaipur, Madhya Pradesh, begun in 1059, and the Gondeshwar
                                Temple at Sinnar. It is clear from what was built that the shikhara would have followed
                                these in having four corner bands of gavaksha-honeycomb sweeping uninterrupted up the
                                full
                                height of the tower, while in between each face has rows of five spirelets on individual
                                podia, reducing in size up the tower.</p>
                        </div>
                        <div class="temple-image">
                            <img src="assets/ksp_0651.webp" alt="Temple Image">
                        </div>

                    </div>
                    <div class="temple-info">
                        <div class="temple-image">
                            <img src="assets/1549452379_img_1847.jpg" alt="Temple Image">
                        </div>
                        <div class="temple-details">

                            <p class="info" id="p3">It is believed that the temple had been built by Pandavas in just
                                one night in a huge single
                                mass of stone during their period of vanvaas. The temple is considered one of the oldest
                                temples built in the middle of the eleventh century that there is no such temple
                                anywhere
                                else in the world. Pandavas could not complete the structure which is reflected even
                                today
                                in the missing roof directly above the main sanctum area (Garbha Griha) of the temple.
                                It is
                                also said that there is a km long passageway which was used by the Pandavas to escape
                                which
                                is closed these days.</p>


                        </div>
                    </div>
                </section>
            </main>
        </div>



        <script>
            $(function () {
                $("#nav-placeholder").load("navbar.php");
            });
        </script>
        <div id="footer-placeholder">
        </div>

        <script>
            $(function () {
                $("#footer-placeholder").load("footer.php");
            });
        </script>
         <script>
                            document.getElementById("translateButton").addEventListener("click", function () {
                                translateToHindi();
                            });
                            document.getElementById("translateButton1").addEventListener("click", function () {
                                translateToEnglish();
                            });
                            function translateToHindi() {
                                document.getElementById("p1").textContent = "अंबरनाथ का शिव मंदिर एक महत्वपूर्ण 11वीं सदी का ऐतिहासिक हिन्दू मंदिर है, जो मुंबई के पास, महाराष्ट्र, भारत में स्थित है। इसे अंब्रेश्वर शिव मंदिर के नाम से भी जाना जाता है, और स्थानीय भाषा में इसे पुरातन शिवालय के रूप में जाना जाता है। यह मंदिर वृंदावन वालधूनि नदी के किनारे स्थित है, अंबरनाथ रेलवे स्थान (पूर्व) से 2 किलोमीटर की दूरी पर है। इस मंदिर का निर्माण 1060 ईसा पूर्व को पत्थर में खूबसूरती से नक्काशी करके किया गया था। यह शायद शिलाहार राजा छित्तराज द्वारा निर्मित हो सकता है, यह संभावना है कि इसे उसके पुत्र मुम्मुनि ने फिर से निर्मित किया हो।";
                                document.getElementById("p2").textContent = "अद्वितीय रूप से, सर्वाग्रह या गर्भगृह भूमि के नीचे है, जिसे मंदप से कुछ 20 सीढ़ियों के नीचे पहुंचा जा सकता है, और ऊपर की ओर खुला है क्योंकि शिखर टावर मंदप की ऊंचाई से थोड़ी ऊंचा होता है, और यह स्पष्ट रूप से कभी पूरा नहीं होता है। यह भूमिज रूप में है, और यदि पूरा होता, तो यह उदयेश्वर मंदिर के रूप में होता, जिसे उदयपुर, मध्य प्रदेश में नीलकंठेश्वर मंदिर के नाम से भी जाना जाता है, जिसका निर्माण 1059 में शुरू हुआ था, और सिन्नर में गोंदेश्वर मंदिर। जो निर्मित हुआ है, उससे स्पष्ट होता है कि शिखर इनमें से एक होता कि चार कोनों की बैंडों का होता है जो गवक्ष-मधुमक्खी के रूप में अविवादित रूप से टावर की पूरी ऊंचाई तक फैलते हैं, जबकि हर मुख के बीच में प्रत्येक चेहरे के ऊपर पंच पंच के पोडिया पर पंच पंच की शिखरों की पंक्तियों होती है, जिनका आकार टावर के साथ घटता है।";
                                document.getElementById("p3").textContent = "माना जाता है कि मंदिर को पांडवों ने अपने वनवास के समय एक बड़े से एक ही पत्थर के माध्यम से एक रात में ही बनाया था। यह मंदिर एक पांचवीं सदी के बीच बनाए गए सबसे पुराने मंदिरों में से एक माना जाता है, ऐसा कोई और मंदिर दुनियाभर में कहीं और नहीं है। पांडव लोग मंदिर की संरचना को पूरा नहीं कर पाए, जिसका परिणाम आज भी मंदिर के मुख्य संकेत स्थल (गर्भगृह) के सीधे ऊपर छत की अनुपस्थिति में दिखाई देता है। इसके अलावा, कहा जाता है कि एक किलोमीटर लम्बी गुफा भी है, जिसका पांडव लोगों ने फरार होने के लिए उपयोग किया था, लेकिन आजकल यह बंद है।";
                            }
                            function translateToEnglish() {
                                document.getElementById("p1").textContent = "The Shiv Mandir of Ambarnath is a historic 11th-century Hindu temple, still worshipped , at Ambarnath near Mumbai, in Maharashtra, India. It is also known as the Ambreshwar Shiva Temple, and known locally as Puratana Shivalaya. It is situated on the bank of vrindawan Waldhuni river, 2 km away from Ambarnath railway station (East). The temple was built in 1060 AD beautifully carved in stone. It was probably built by Shilahara king Chhittaraja, it may also have been rebuilt by his son Mummuni."
                                document.getElementById("p2").textContent = "Unusually, the sanctuary or garbhagriha is below ground, reached by some 20 steps down from the mandapa, and is open to the sky as the shikhara tower above stops abruptly at a little above the height of the mandapa, and was apparently never completed. It is in bhumija form, and if completed would have been close in form to the Udayesvara Temple also known as Neelkantheshwara temple in Udaipur, Madhya Pradesh, begun in 1059, and the Gondeshwar Temple at Sinnar. It is clear from what was built that the shikhara would have followed these in having four corner bands of gavaksha-honeycomb sweeping uninterrupted up the full height of the tower, while in between each face has rows of five spirelets on individual podia, reducing in size up the tower."
                                document.getElementById("p3").textContent = "It is believed that the temple had been built by Pandavas in just one night in a huge single mass of stone during their period of vanvaas. The temple is considered one of the oldest temples built in the middle of the eleventh century that there is no such temple anywhere else in the world. Pandavas could not complete the structure which is reflected even today in the missing roof directly above the main sanctum area (Garbha Griha) of the temple. It is also said that there is a km long passageway which was used by the Pandavas to escape which is closed these days."
                            }
                        </script>
    </div>
</body>

</html>