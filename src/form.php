<body class="content-dark">
    <img class="margin_right" src="static/img/blankoukko.png" alt="Blanko logo" />
    <div class="container">
        <h1>Tiedotustorvi</h1>
        <?php if (isset($_GET["status"])) {
            if ($_GET["status"] == "success") {
                echo "<div class='alert alert-success'>Announcement sent successfully!</div>";
            }
            if ($_GET["status"] == "error") {
                echo "<div class='alert alert-error'>An error occured :(</div>";
            }
        } ?>

            <div class="row align-items-start">
                <div class="col-12 col-lg-6 main-wrap">
                    <form method="post" action="index.php">
                        <label for="title" class="mb-2">Title</label>
                        <input id="title" name="title" class="form-control form-control-lg bg-dark text-white" required="" />
                        <label for="description" class="mb-2">Description</label>
                        <textarea id="description" name="description" class="form-control bg-dark text-white" required="" rows="15"></textarea>
                        <label for="signature" class="mb-2">Signature</label>
                        <textarea id="signature" name="signature" class="form-control bg-dark text-white" required="" rows="5"></textarea>
                        <span class="char_count">max. 2000 chars</span>
                        <br />

                        <label for="platforms">Send this to:</label> <br />
                        <div class="container">
                            <div class="">
                                    <div class="form-check form-switch form-check-inline">
                                        <input type="checkbox" id="platform_blankoweb" name="blankoweb" value="blankoweb" class="form-check-input">
                                        <label class="form-check-label" for="platform_blankoweb"> Blankoweb</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input type="checkbox" id="platform_discord" name="discord" value="discord" class="form-check-input">
                                        <label class="form-check-label" for="platform_discord"> Discord</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input type="checkbox" id="platform_email" name="email" value="email" class="form-check-input">
                                        <label class="form-check-label" for="platform_email"> Email</label>
                                    </div>
                                    <div class="form-check form-switch form-check-inline">
                                        <input type="checkbox" id="platform_telegram" name="telegram" value="telegram" class="form-check-input">
                                        <label class="form-check-label" for="platform_telegram"> Telegram</label>
                                    </div>
                            </div>
			            </div>
				<!--
                    <label for="url">URL</label>
                    <input id="url" name="url" class="form-control form-control-lg bg-dark text-white" placeholder="optional" />
                    -->



                        <label for="reply-to" class="mb-2">Reply-to</label>
                        <input id="reply-to" name="reply-to" class="form-control form-control-lg bg-dark text-white" placeholder="for example: tapahtumavastaava@blanko.fi" required="" />
                        <label for="tags" class="mb-2">Tag</label> <br/>
                        <div class="container">
                        <div class="">
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Blanko" name="tag" class="form-check-input" value="Blanko">
                                <label class="form-check-label" for="Blanko">Blanko</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Blankki" name="tag" class="form-check-input" value="Blankki">
                                <label class="form-check-label" for="Blankki">Blankki</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Kokoukset" name="tag" class="form-check-input" value="Kokoukset">
                                <label class="form-check-label" for="Kokoukset">Kokoukset</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Kulttuuri" name="tag" class="form-check-input" value="Kulttuuri" required>
                                <label class="form-check-label" for="Kulttuuri">Kulttuuri</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="OYY" name="tag" class="form-check-input" value="OYY">
                                <label class="form-check-label" for="OYY">OYY</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Tapahtumat" name="tag" class="form-check-input" value="Tapahtumat">
                                <label class="form-check-label" for="Tapahtumat">Tapahtumat</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="TOL" name="tag" class="form-check-input" value="TOL">
                                <label class="form-check-label" for="TOL">TOL</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Tyopaikat" name="tag" class="form-check-input" value="Työpaikat">
                                <label class="form-check-label" for="Tyopaikat">Työpaikat</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Urheilu" name="tag" class="form-check-input" value="Urheilu">
                                <label class="form-check-label" for="Urheilu">Urheilu</label>
                            </div>
                            <div class="form-check form-check-inline mr-4">
                                <input type="radio" id="Yliopisto" name="tag" class="form-check-input" value="Yliopisto">
                                <label class="form-check-label" for="Yliopisto">Yliopisto</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="false" name="scheduler_check" id="scheduler_checkbox" onclick="$('#scheduler_group').toggle();">
                        <label class="form-check-label" for="scheduler_check">
                            Scheduled message (opens date picker)
                        </label>
                        </div>

                        <div id="scheduler_group" class="collapse">

                        <label for="scheduled_time">Schedule message</label>
                        <input id="scheduled_time"
                                    name="scheduled_time" class="form-control col-lg-6 form-control-lg bg-dark text-white" data-field="datetime" placeholder="Click here to pick the time" readonly required="" />
                            <div id="dt_start"></div>
                        

</div>

                        <div class="pl-3 pb-2 my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="ready" id="verify" />
                                <label class="form-check-label" for="verify">Ready to go? Remember to select a tag for the title!</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mb-2 disabled submit-button" id="submit_btn_instant">Send instantly</button>
                        <button type="submit" class="btn btn-primary mb-2 disabled submit-button" id="submit_btn_schedule">Schedule message</button>
                        
                    </form>
                </div>

                <!-- Preview -->

                <div class="col-12 col-lg-6 preview">
                    <label>Preview</label>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-discord-tab" data-bs-toggle="tab" data-bs-target="#nav-discord" role="tab" aria-controls="nav-discord" aria-selected="true">Discord #ilmoitustaulu</a>
                            <a class="nav-item nav-link" id="nav-telegram-tab" data-bs-toggle="tab" data-bs-target="#nav-telegram" role="tab" aria-controls="nav-telegram" aria-selected="false">Telegram</a>
                            <a class="nav-item nav-link" id="nav-email-tab" data-bs-toggle="tab" data-bs-target="#nav-email" role="tab" aria-controls="nav-email" aria-selected="false">Email</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-discord" role="tabpanel" aria-labelledby="nav-discord-tab">
                            <div class="wrapper">
                                <h3>Title goes here, start writing</h3>
                                <div class="description"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-telegram" role="tabpanel" aria-labelledby="nav-telegram-tab">
                            <div class="wrapper">
                                <h3>Title goes here, start writing</h3>
                                <div class="description"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
                            <div class="wrapper">
                                <pre class="header"></pre>
                                <h3>Title goes here, start writing</h3>
                                <div class="description"></div>
                                <div class="signature"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>
