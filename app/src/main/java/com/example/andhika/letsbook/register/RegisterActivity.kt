package com.example.andhika.letsbook.register

import android.content.Intent
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.login.LoginActivity
import com.example.andhika.letsbook.model.RegisterRequest
import com.example.andhika.letsbook.model.RegisterResponse
import com.example.andhika.letsbook.utils.setEnable
import com.example.andhika.letsbook.utils.showSnackBar
import com.jakewharton.rxbinding2.widget.RxTextView
import io.reactivex.Observable
import io.reactivex.functions.Function4
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

        presenter.setValidation(
            Observable.combineLatest(
                RxTextView.textChanges(et_email).map {
                    it.isNotEmpty()
                },
                RxTextView.textChanges(et_username).map {
                    it.isNotEmpty()
                },
                RxTextView.textChanges(et_phone).map {
                    it.isNotEmpty() && it.length > 11
                },
                RxTextView.textChanges(et_password).map {
                    it.isNotEmpty() && it.length > 6
                },
                Function4 { t1, t2, t3, t4  ->
                    t1 && t2 && t3 && t4
                }
            )
        )
        btn_register.setOnClickListener {
            presenter.goToMain(RegisterRequest(et_email.text.toString(),et_password.text.toString(),et_username.text.toString(),
                et_phone.text.toString()))
        }
    }

    override fun postRegister(response: RegisterResponse) {
        startActivity(Intent(this@RegisterActivity,LoginActivity::class.java))
    }

    override fun getValidation(boolean: Boolean) {
        btn_register.setEnable(boolean)
    }

    override fun showError(error: Any) {
        showSnackBar(btn_register, error.toString())
    }
}