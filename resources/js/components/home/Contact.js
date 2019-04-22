import React, {Component} from 'react'; // eslint-disable-line
import axios from 'axios'
import NotificationMessage from  '../Template/NotificationMessage';
export default class Contact extends Component {
    constructor() {
        super();
        this.state = {
            contactForm: {
                name: '',
                email: '',
                budget: '',
                message: '',
            },
            isProduction: process.env.MIX_APP_ENV == 'local' ? false : true,
            success: [],
            errors: [],
            newContactQuery: ``.replace(/\s/g, '')
        }

    }

    componentWillMount() {


    }

    handleInputChange(e) {
        let contactForm = this.state.contactForm;
        contactForm[e.target.name] = e.target.value;
        this.setState({contactForm: contactForm});
        let newContactQuery = `mutation{newContactUs(
                    name:"` + contactForm['name'] + `",
            email:"` + contactForm['email'] + `",
            budget:` + contactForm['budget'] + `,
            message:"` + contactForm['message'] + `"
    )}`.replace(/\s/g, '');

        this.setState({newContactQuery: newContactQuery.replace(/\s/g, '')})

    }

    submitContactForm() {
        axios.post('/api/contact-us', {
            name: this.state.contactForm.name,
            email: this.state.contactForm.email,
            budget: this.state.contactForm.budget,
            message: this.state.contactForm.message,
            'g-recaptcha-response': $('#g-recaptcha-response').val(),
        }).then(() => {
            this.setState({success: ['email sent successfully']});
        }).catch(error => {
            this.setState({errors: error.response.data});
        }).then(() => {
            $('html,body').animate({
                scrollTop: ( $('#contact').offset().top - 80 )
            }, 1000);
        })
    }

    submitContactFormQraphQL() {
        axios.get('/graphql', {
            params: {
                query: this.state.newContactQuery
            },
        }).then(() => {
            this.setState({success: ['email sent successfully']});
        }).catch(error => {
            this.setState({errors: error.response.data});
        }).then(() => {
            $('html,body').animate({
                scrollTop: ( $('#contact').offset().top - 80 )
            }, 1000);
        })
    }

    render() {
        return (
            <section id="contact" className="contact bg-white roomy-50">
                <div className="container">
                    <div className="row">
                        <div className="main_contact">
                            <div className="head_title">
                                <h5><span className="divider"></span> Get enquiries now</h5>
                            </div>
                            <div className="col-md-5">
                                <NotificationMessage success={this.state.success} errors={this.state.errors}/>
                                <form className="m-top-50" id="contact-us-form" onSubmit={(e) => {
                                    this.submitContactForm();
                                    e.preventDefault();
                                }} method="POST">
                                    <div className="form-group">
                                        <input type="text" value={this.state.contactForm.name} required name="name"
                                               className="form-control"
                                               placeholder="your name"
                                               onChange={this.handleInputChange.bind(this)}
                                        />
                                    </div>
                                    <div className="form-group">
                                        <input type="text" value={this.state.contactForm.email} required name="email"
                                               className="form-control"
                                               placeholder="your e-mail"
                                               onChange={this.handleInputChange.bind(this)}
                                        />
                                    </div>
                                    <div className="form-group">
                                        <input type="text" value={this.state.contactForm.budget} required name="budget"
                                               className="form-control"
                                               placeholder="your budget"
                                               onChange={this.handleInputChange.bind(this)}
                                        />
                                    </div>
                                    <div className="form-group">
                            <textarea required name="message" className="form-control" rows="5"
                                      placeholder="you message"
                                      value={this.state.contactForm.message}
                                      onChange={this.handleInputChange.bind(this)}/>
                                    </div>
                                    <div className="form-group">
                                        <label className="google-recaptcha-error">Recaptcha</label>
                                        <div className="g-recaptcha"
                                             data-sitekey={process.env.MIX_GOOGLE_RECAPTCHA_SITE_KEY}
                                             data-callback="enableFormSubmit"></div>
                                    </div>
                                    <div className="form_btn text-right m-top-50">
                                        <button type="submit" className="btn btn-primary"
                                                disabled={this.state.isProduction}>Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div className="col-md-6 col-md-offset-1 sm-m-top-50">
                                <div className="contact_content">
                                    <div className="head_right">
                                        <h2>contact me</h2>
                                    </div>

                                    <div className="contact_content_text">
                                        <p>{this.props.contactUSDescription}</p>
                                        <ul className="m-top-50">
                                            <li>{this.props.contactUSAddress}
                                            </li>
                                            <li className="phone">{this.props.contactUSPhone}</li>
                                            <li className="info">{this.props.contactUSEmail}</li>
                                        </ul>

                                        <div className="author_text text-right">
                                            <h5>Regards!</h5>
                                            <h1>{this.props.websiteName}</h1>
                                            <h6>{this.props.firstHashTag.replace("#", "")}
                                                & {this.props.secondHashTag.replace("#", "")}</h6>
                                        </div>
                                        <div className="copyright text-right m-top-80">
                                            <p className="wow fadeInRight">Made with <i className="fa fa-heart"></i> by
                                                <a
                                                    href="{{route('homeIndex')}}">{this.props.websiteLogo}</a>2018.
                                                All
                                                Rights Reserved</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        );
    }
}

