 
        <style>

            #syllabus {
                height:95vh;
                width: 55%;
                margin: 20px auto;
                border: 2px solid red;
                box-shadow: 0 0 5px red;
            }
            .demo-msg{
                display: none;
            }
        </style>
        <section class="affordable-homes" style="background:#ffffff;">
            <h4><?= $syllabus['title']; ?></h4>
            <div class="container" id="syllabus"> 
            </div>
        </section>
    <script>

        $('#syllabus').FlipBook({
            pdf: '<?= file_url($syllabus['filepath']); ?>',
            template: {
                html: '<?=file_url("assets/plugins/flipbook/templates/default-book-view.html"); ?>',
                styles: [
                    '<?=file_url("assets/plugins/flipbook/css/short-black-book-view.css"); ?>'
                ],
                links: [
                    {
                        rel: 'stylesheet',
                        href: '<?=file_url("assets/plugins/flipbook/css/font-awesome.min.css"); ?>'
                    }
                ],
                script: '<?=file_url("assets/plugins/flipbook/js/default-book-view.js"); ?>'
            }
        });
    </script>