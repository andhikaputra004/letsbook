package com.example.andhika.letsbook.register

import android.content.Intent
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.login.LoginActivity
import com.example.andhika.letsbook.model.RegisterRequest
import com.example.andhika.letsbook.model.RegisterResponse
import kotlinx.android.synthetic.main.activity_register.*
import javax.inject.Inject

class RegisterActivity : BaseActivity() , RegisterContract.View{

    @Inject
    lateinit var presenter: RegisterPresenter

    override fun onSetupLayout() {
        setContentView(R.layout.activity_register)
    }

    override fun onViewReady() {
        presenter.takeView(this)
        lifecycle.addObserver(presenter)

        btn_register.setOnClickListener {
            presenter.goToMain(RegisterRequest(et_email.text.toString(),et_password.text.toString(),et_phone.text.toString(),
                et_username.text.toString()))
        }
    }

    override fun postRegister(response: RegisterResponse) {
        startActivity(Intent(this@RegisterActivity,LoginActivity::class.java))
    }

}