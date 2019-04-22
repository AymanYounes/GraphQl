import React, {Component} from 'react'; // eslint-disable-line
import ReactDOM from 'react-dom'; // eslint-disable-line
import axios from 'axios'

export default class Portfolio extends Component {
    constructor() {
        super();
        this.state = {
            projects: [],
        }
        this.projectQuery = `
        query{
              allProjects(first:3){
                id,
                url,
                name,
                image
              }
            }
`.replace(/\s/g, '');
    }

    componentWillMount() {
        axios.get('/graphql', {
            params: {
                query: this.projectQuery
            }
        }).then(response => {
            this.setState({
                projects: response.data.data.allProjects,
            });
        }).catch(error => {
            console.log(error);
        });
    }

    render() {
        this.projectsList = this.state.projects.map((item, key) =>
            <div key={item.id} className="col-md-4 col-sm-4 col-xs-4">
                <a href={item.url}>
                    <img style={{width: '87px'}} src={item.image} alt={item.name}/>
                </a>
            </div>
        );
        return (
            <section id="portfolio" className="portfolio bg-white roomy-50">
                <div className="container">
                    <div className="row">
                        <div className="main_portfolio">
                            <div className="col-md-5 hidden-sm hidden-xs">
                                <div className="portfolio_item">
                                    <div className="head_title">
                                        <h5><span className="divider"></span> my latest works</h5>
                                    </div>
                                    <div className="row m-top-60">
                                        <div className="col-sm-6">
                                            <div className="portf_item_text photography">
                                                <a href="/images/portfolio-1.png" className="popup-img"><img
                                                    src="/images/portfolio-1.png" alt=""/></a>
                                                <h5 className="m-top-30"></h5>
                                            </div>
                                        </div>
                                        <div className="col-sm-6">
                                            <div className="portf_item_text branding xs-m-top-40">
                                                <a href="/images/portfolio-2.png" className="popup-img"><img
                                                    src="/images/portfolio-2.png" alt=""/></a>
                                                <h5 className="m-top-30"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="col-md-6 col-md-offset-1 sm-m-top-50 col-sm-12">
                                <div className="portfolio_content">
                                    <div className="head_right">
                                        <h2>portfolio</h2>
                                    </div>

                                    <div className="portfolio_content_text">
                                        <p>{this.props.portfolioDescription}</p>
                                    </div>
                                </div>

                                <div className="may_client m-top-50">
                                    <div className="head_title text-right">
                                        <h5><span className="divider"></span> my clients</h5>
                                    </div>
                                    <div className="client_brand m-top-60 text-right">
                                        <div className=" row">
                                            {this.projectsList}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div className="portfolio_btn text-center fix m-top-100">
                                <a href="/project" className="btn btn-primary">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        );
    }
}

