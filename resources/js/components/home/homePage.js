import React, {Component} from 'react'; // eslint-disable-line
import ReactDOM from 'react-dom'; // eslint-disable-line
import Slider from './Slider';
import About from './About';
import Portfolio from './Portfolio';
import Contact from './Contact';
import axios from 'axios';


export default class HomePage extends Component {
    constructor() {
        super();
        this.state = {
            settings: {},
            mainImage: '',
            SliderMainTitle: '',
            firstHashTag: '',
            secondHashTag: '',
            websiteName: '',
            paragraphs: {},
            aboutMeDescription: '',
            portfolioDescription: '',
            contactUSDescription: '',
            contactUSAddress: '',
            websiteLogo: '',
        }
        this.ParagraphQuery = `
        query{
              allParagraphs(identifyArr: ["about-me-description","portfolio-description","contact-us-description","contact-us-address"]){
                name,
                identify,
                value
                              }
            }
`.replace(/\s/g, '');
        this.SettingsQuery = `
        query{
              allSettings{
                name,
                identify,
                value
                              }
            }
`.replace(/\s/g, '');
    }

    componentWillMount() {
        axios.get('/graphql', {
            params: {
                query: this.SettingsQuery
            }
        }).then(response => {
            this.setState({
                settings: response.data.data.allSettings,
            });
            let myMap = new Map();
            for (let setting in this.state.settings) {
                myMap.set(this.state.settings[setting].identify, this.state.settings[setting]);
            }
            this.setState({
                mainImage: myMap.get('main-image').value,
                SliderMainTitle: myMap.get('slider-main-title').value,
                firstHashTag: myMap.get('first-hash-tag').value,
                secondHashTag: myMap.get('second-hash-tag').value,
                websiteName: myMap.get('website-name').value,
                contactUSPhone: myMap.get('contact-us-phone').value,
                contactUSEmail: myMap.get('contact-us-email').value,
                websiteLogo: myMap.get('website-logo').value,

            });
        }).catch(error => {
            console.log(error);
        });
        axios.get('/graphql', {
            params: {
                query: this.ParagraphQuery
            }
        }).then(response => {
            this.setState({
                paragraphs: response.data.data.allParagraphs,
            });
            let myMap = new Map();
            for (let paragraph in this.state.paragraphs) {
                myMap.set(this.state.paragraphs[paragraph].identify, this.state.paragraphs[paragraph]);
            }
            this.setState({
                aboutMeDescription: myMap.get('about-me-description').value,
                portfolioDescription: myMap.get('portfolio-description').value,
                contactUSDescription: myMap.get('contact-us-description').value,
                contactUSAddress: myMap.get('contact-us-address').value,
            });
        }).catch(error => {
            console.log(error);
        })
    }

    render() {

        return (
            <div>
                <Slider
                    mainImage={this.state.mainImage}
                    SliderMainTitle={this.state.SliderMainTitle}
                    firstHashTag={this.state.firstHashTag}
                    secondHashTag={this.state.secondHashTag}
                />
                <About
                    websiteName={this.state.websiteName}
                    aboutMeDescription={this.state.aboutMeDescription}
                />
                <Portfolio portfolioDescription={this.state.portfolioDescription}/>
                <Contact
                    contactUSDescription={this.state.contactUSDescription}
                    contactUSAddress={this.state.contactUSAddress}
                    contactUSPhone={this.state.contactUSPhone}
                    contactUSEmail={this.state.contactUSEmail}
                    websiteLogo={this.state.websiteLogo}
                    websiteName={this.state.websiteName}
                    firstHashTag={this.state.firstHashTag}
                    secondHashTag={this.state.secondHashTag}
                />
            </div>

        );
    }
}

if (document.getElementById('home-page-container')) {
    ReactDOM.render(<HomePage />, document.getElementById('home-page-container'));
}
