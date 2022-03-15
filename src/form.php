<body class="content-dark">
    <img class="margin_right" src="static/img/blankoukko.png" alt="Blanko logo" />
    <div class="container">
        <h1>Blankon tiedotustorvi</h1>
        <?php if (isset($_GET["status"])) {
            if ($_GET["status"] == "success") {
                echo "<div class='alert alert-success'>Announcement sent successfully!</div>";
            }
            if ($_GET["status"] == "error") {
                echo "<div class='alert alert-error'>An error occured :(</div>";
            }
        } ?>

            <div class="row align-items-start">
                <div class="col-6 main-wrap form-group">
                    <form method="post" action="index.php">
                        <label for="title">Title</label>
                        <input id="title" name="title" class="form-control form-control-lg bg-dark text-white" required="" />
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control bg-dark text-white" required="" rows="15"></textarea>
                        <label for="signature">Signature</label>
                        <textarea id="signature" name="signature" class="form-control bg-dark text-white" required="" rows="5"></textarea>
                        <span class="char_count">max. 2000 chars</span>
                        <br />

			<label for="platforms">Send this to:</label> <br />
			<div class="container">
                            <div class="row">
                                        <input type="checkbox" id="platform_discord" name="discord" value="discord">
                                        <label for="platform1"> Discord</label>

                                        <input type="checkbox" id="platform_telegram" name="telegram" value="telegram">
                                        <label for="platform2"> Telegram</label>

                                        <input type="checkbox" id="platform_email" name="email" value="email">
                                        <label for="platform3"> Email</label>
                            </div>
			</div>
				<!--
                    <label for="url">URL</label>
                    <input id="url" name="url" class="form-control form-control-lg bg-dark text-white" placeholder="optional" />
                    -->
                        <!--<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" name="calendar_check" id="calendar_check" onclick="$('#calendar_group').toggle();">
  <label class="form-check-label" for="calendar_check">
    Calendar item
  </label>
</div>

<div id="calendar_group" class="collapse">

                    <label for="datetime_start">Starting time</label>
                    <input id="datetime_start"
                                name="datetime_start" class="form-control col-lg-6 form-control-lg bg-dark text-white" data-field="datetime" readonly />
                        <div id="dt_start"></div>
                    <label for="datetime_end">Ending time</label>
                    <input id="datetime_end" name="datetime_end" class="form-control col-lg-6 form-control-lg bg-dark text-white" data-field="datetime" readonly />
                        <div id="dt_end"></div>

</div>

-->
                        <label for="reply-to">Reply-to</label>
                        <input id="reply-to" name="reply-to" class="form-control form-control-lg bg-dark text-white" placeholder="for example: tapahtumavastaava@blanko.fi" required="" />

                        <div class="row pl-3 pb-2">
                            <input class="form-check-input" type="checkbox" value="" name="ready" id="verify" />
                            <label class="form-check-label" for="ready">Ready to go? Remember to add a tag to the title!</label>
                        </div>

                        <button type="submit" class="btn btn-primary disabled mb-2" id="submit_btn">Send</button>
                    </form>
                </div>

                <!-- Preview -->

                <div class="col-6 preview">
                    <label>Preview</label>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-discord-tab" data-toggle="tab" href="#nav-discord" role="tab" aria-controls="nav-discord" aria-selected="true">Discord #ilmoitustaulu</a>
                            <a class="nav-item nav-link" id="nav-telegram-tab" data-toggle="tab" href="#nav-telegram" role="tab" aria-controls="nav-telegram" aria-selected="false">Telegram</a>
                            <a class="nav-item nav-link" id="nav-email-tab" data-toggle="tab" href="#nav-email" role="tab" aria-controls="nav-email" aria-selected="false">Email</a>
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
