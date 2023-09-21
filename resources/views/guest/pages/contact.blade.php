<x-guest-layout >
    <x-slot name='title'>
        contact
    </x-slot>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->

            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action={{url('/contact/store')}} method="post">
                @csrf
{{--                @method('put')--}}
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *"
                                data-sb-validations="required" name="name" value="{{ old('name')}}"/>
                                @error('name')
                                <div class="text-danger" >{{$message}}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="text" placeholder="Your Email *"
                                data-sb-validations="required,email" name="email" value="{{old('email')}}" />
                               @error('email')
                                <div class="text-danger">{{$message}}</div>
                               @enderror

                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                                data-sb-validations="required" name="phone_number" value="{{ old('phone_number')}}"/>
                                @error('phone_number')
                                <div class="text-danger" >{{$message}}</div>
                                @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required" name="message">{{ old('message')}}</textarea>
                            @error('message')
                                <div class="text-danger" >{{$message}}</div>
                            @enderror

                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a
                            href="https://startbootstrap.com/solution/contact-forms"></a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase"
                         type="submit">Send Message</button></div>
            </form>
        </div>
    </section>
</x-guest-layout>
