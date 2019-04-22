import React, { Component } from 'react'; // eslint-disable-line

export default class InnerProject extends Component {
render(){
    return(
        <div className="col-md-4 col-sm-6 col-xs-12 no-padding height-160">
            <a href={this.props.url}>
                <img className="project-img"
                     src={this.props.image}
                     alt={this.props.name}/>
            </a>
            <h6>{this.props.name}(<b>{this.props.company_name}</b>)</h6>
        </div>
    );
}
}