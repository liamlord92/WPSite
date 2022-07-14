render(){
    return(
        <div className='user-signup-form'>
            <h2 className="signup-page__heading mb-3"><span className='heading--desktop'>2.</span><span className='heading--mobile'>1.</span> Create your secure account</h2>
            <p className='signup-page__body mb-4'>Enter your email and create a password below. <br/> Already a member? <a href="/maker/login">Login</a> to your Let’s Knit Together account</p>
            <div id="memberForm">
                <form id="memberSignupForm" className="blaize-form-register blaize-form blaize-theme-default" method="POST" onSubmit={this.submitForm}>
                    <div className="form-group">
                        <div className='signup-stage-two__sized-element'>
                            <fieldset className="blaize-identifiers">
                                <div className="form-row">
                                    <div 
                                        id="floatContainer1" 
                                        className={'border rounded-3 mb-3 float-container ' + this.state.emailError}
                                    >
                                        <label for="floatField1">Email Address</label>
                                        <input 
                                            onKeyUp={this.validateInput}  
                                            type="email" 
                                            id="inputEmail" 
                                            name="email_address"
                                            onFocus={this.handleFocus}
                                            onBlur={this.handleBlur}
                                            className="ps-0"
                                        />
                                    </div>
                                </div>
                            </fieldset>
                            <div className="blaize-validators">
                                <div className="form-row">
                                    <div 
                                        id="floatContainer1" 
                                        className={'border rounded-3 mb-3 float-container ' + this.state.passError}
                                    >
                                        <label for="floatField1">Choose a Password</label>
                                        <input 
                                            onKeyUp={this.validateInput}  
                                            type={this.state.checked ? "text" : "password"}
                                            id="inputPass" 
                                            name="password"
                                            onFocus={this.handleFocus}
                                            onBlur={this.handleBlur}
                                            className="ps-0"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input 
                            className="btn btn-main blaize-submit blaize-complete-registration border-0" 
                            id="side_reg_ssi_submit" 
                            type="submit"
                            value="Complete Registration"
                        />
                    </div>
                </form>
            </div>
        </div>
    )
}