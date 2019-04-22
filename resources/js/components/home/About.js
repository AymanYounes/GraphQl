import React, {Component} from 'react'; // eslint-disable-line
import axios from 'axios'
export default class About extends Component {
    constructor() {
        super();
        this.state = {
            educations: [],
            workExperiences: [],
        }
        this.educationQuery = `
        query{
              allEducations{
                id,
                name
              }
            }
`.replace(/\s/g, '');

        this.workExperiencesQuery = `
        query{
              allWorkExperiences{
                id,
                name,
                start_date
              }
            }
`.replace(/\s/g, '');
    }

    componentWillMount() {

        axios.get('/graphql', {
            params: {
                query: this.educationQuery
            }
        }).then(response => {
            this.setState({
                educations: response.data.data.allEducations,
            });
        }).catch(error => {
            console.log(error);
        })
        axios.get('/graphql', {
            params: {
                query: this.workExperiencesQuery
            }
        }).then(response => {
            this.setState({
                workExperiences: response.data.data.allWorkExperiences,
            });
        }).catch(error => {
            console.log(error);
        })
    }

    render() {
        this.educationsList = this.state.educations.map((item, key) =>
            <li key={item.id}><a href=""><i className="fa fa-chevron-right"></i>{item.name}</a></li>
        );
        this.workExperiencesList = this.state.workExperiences.map((item, key) =>
            <li key={item.id}><i className="fa fa-chevron-right"></i>{item.name}
                | {new Date(item.start_date).getFullYear()}</li>
        );
        return (
            <section id="about" className="about bg-light roomy-150">
                <div className="container">
                    <div className="row">
                        <div className="main_about">
                            <div className="col-md-5 col-md-offset-1">
                                <div className="about_content">
                                    <div className="head_right">
                                        <h2>About me</h2>
                                    </div>
                                    <div className="about_content_text">
                                        <p>{this.props.aboutMeDescription}</p>

                                        <div className="divider1 m-top-10"></div>

                                        <div className="about_content_item m-top-30">
                                            <h6><i className="fa fa-graduation-cap"></i> Education History</h6>
                                            <ul>
                                                { this.educationsList}
                                            </ul>
                                        </div>
                                        <div className="about_content_item m-top-20">
                                            <h6><i className="fa fa-briefcase"></i> Work Experiences</h6>
                                            <ul>
                                                {this.workExperiencesList}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="col-md-5 col-md-offset-1 sm-m-top-50">
                                <div className="head_title text-right">
                                    <h5><span className="divider"></span> my name is {this.props.websiteName}</h5>
                                </div>
                                <div className="about_left_item m-top-50">
                                    <img src="/images/about-img1.png" alt=""/>
                                </div>

                                <div className="about_socail m-top-50">
                                    <ul className="list-inline">
                                        <li><span className="divider"></span></li>
                                        <li><a target="_blank" href="https://github.com/MBFouad/"><i
                                            className="fa fa-github fa-3x"></i></a></li>
                                        <li><a target="_blank" href="https://www.facebook.com/mbahaa.eldien"><i
                                            className="fa fa-facebook fa-3x"></i></a></li>
                                        <li><a target="_blank" href="https://twitter.com/Mohamed50915950"><i
                                            className="fa fa-twitter fa-3x"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://www.linkedin.com/in/mohamed-bahaa-el-dien-598b21102/"><i
                                            className="fa fa-linkedin fa-3x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        );
    }
}

