<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="/js/datepicker_ru.js"></script>
<script src="/js/my_scripts.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/fontawesome-free-5.13.0-web/js/all.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>

<script>
    var subscribeModal = new Vue({
        el: '#subscribeModal',
        data: {
            name: '',
            email: '',
            information: '',
            errors: [],
        },
        methods: {
            subscribeUser() {
                this.errors = [];

                let birth_date = $("#birth_date").val();

                if (!this.name) {
                    this.errors.push('Укажите имя.');
                }

                if (!this.email) {
                    this.errors.push('Укажите электронную почту.');
                } else if(!this.validEmail(this.email)){
                    this.errors.push('Укажите корректный адрес электронной почты.');
                }

                if (!birth_date) {
                    this.errors.push('Укажите дату рождения.');
                }

                let form_data = new FormData();
                form_data.append('name', this.name);
                form_data.append('email', this.email);
                form_data.append('birth_date', this.birth_date);

                if (this.errors.length == 0) {
                    axios.post('/subscribe/user', form_data)
                        .then(res => {
                            this.information = res.data;
                            $("#alert").removeClass('fade');
                        })
                        .catch(err => {
                            this.information = err.data;
                            $("#alert").removeClass('fade');
                        })
                }
            },
            validEmail: function (email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    })
</script>

<script>
    const anchors = document.querySelectorAll('a[href*="#"]')
    for (let anchor of anchors) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault()
            const blockID = anchor.getAttribute('href').substr(1)
            document.getElementById(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        })
    }
</script>
<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            if($(this).scrollTop() != 0) {
                $('#topNubex').fadeIn();
            } else {
                $('#topNubex').fadeOut();
            }
        });
        $('#topNubex').click(function() {
            $('body,html').animate({scrollTop:0},700);
        });
    });
</script>

@if(!$agent->isMobile())
    <style>
        .navbar {
            position: relative;
        }
        .navbar-collapse {
            flex-grow: 0 !important;
        }
        .navbar-expand-lg {
            justify-content: space-between !important;
        }

    </style>
@endif

@stack('scripts')
