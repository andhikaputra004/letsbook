package com.example.andhika.letsbook.login

import android.content.Intent
import android.support.v4.content.res.ResourcesCompat
import android.text.SpannableStringBuilder
import android.text.Spanned
import android.text.TextPaint
import android.text.style.ClickableSpan
import android.view.View
import com.example.andhika.letsbook.MainActivity
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.main.Main2Activity
import com.example.andhika.letsbook.model.LoginReponse
import com.example.andhika.letsbook.model.LoginRequest
import com.example.andhika.letsbook.register.RegisterActivity
import com.example.andhika.letsbook.utils.Costant.Common.Companion.EMAIL
import com.example.andhika.letsbook.utils.Costant.Common.Companion.ID_PELANGGAN
import com.example.andhika.letsbook.utils.Costant.Common.Companion.NAMA_PELANGGAN
import com.example.andhika.letsbook.utils.getColorCompat
import com.example.andhika.letsbook.utils.setEnable
import com.example.andhika.letsbook.utils.showSnackBar
import com.jakewharton.rxbinding2.widget.RxTextView
import io.reactivex.Observable
import io.reactivex.functions.BiFunction
import kotlinx.android.synthetic.main.activity_main.*
import javax.inject.Inject

class LoginActivity : BaseActivity() , LoginContract.View {



    @Inject
    lateinit var presenter: LoginPresenter

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    override fun onSetupLayout() {
        setContentView(R.layout.activity_main)
    }

    override fun onViewReady() {
        presenter.takeView(this)
        lifecycle.addObserver(presenter)
        setClickRegister()
        when{
            sharedPreferenceHelper.getString(ID_PELANGGAN) != "" ->{
                startActivity(Intent(this@LoginActivity,Main2Activity::class.java))
                finish()
            }
        }
        btn_login.setOnClickListener {
            presenter.goToLogin(LoginRequest(et_username.text.toString(),et_password.text.toString()))
        }
        presenter.setValidation(
            Observable.combineLatest(
                RxTextView.textChanges(et_username).map {
                    it.isNotEmpty()
                },
                RxTextView.textChanges(et_password).map {
                    it.isNotEmpty()
                },
                BiFunction { email, pass ->
                    email && pass
                }
            ))
    }

    override fun getLoginReponse(response: LoginReponse) {
        response.datapelanggan?.idPelanggan?.let { sharedPreferenceHelper.setString(ID_PELANGGAN, it) }
        response.datapelanggan?.namaPelanggan?.let { sharedPreferenceHelper.setString(NAMA_PELANGGAN,it) }
        response.datapelanggan?.email?.let { sharedPreferenceHelper.setString(EMAIL,it) }

        startActivity(Intent(this@LoginActivity,Main2Activity::class.java))
    }


    private fun setClickRegister() {
        val str2 = getString(R.string.txt_sign_up)
        val str = getString(R.string.txt_don_t_have_an_account_sign_up, str2)
        val start = str.indexOf(str2)
        val end = start + str2.length

        val spanBuilder = SpannableStringBuilder(str)
        val clickSpan = object : ClickableSpan() {
            override fun onClick(widget: View?) {
            }

            override fun updateDrawState(ds: TextPaint?) {
                super.updateDrawState(ds)
                ds?.let {
                    it.isUnderlineText = false
                    it.color = this@LoginActivity.getColorCompat(R.color.colorPrimary)
                }
            }

        }
        spanBuilder.setSpan(clickSpan, start, end, Spanned.SPAN_EXCLUSIVE_EXCLUSIVE)
        with(tv_register) {
            text = spanBuilder
            highlightColor = android.graphics.Color.TRANSPARENT
            movementMethod = android.text.method.LinkMovementMethod.getInstance()
            setOnClickListener {
                startActivity(android.content.Intent(this@LoginActivity, RegisterActivity::class.java))
            }

        }

    }
    override fun showError(error: Any) {
        showSnackBar(btn_login, error.toString())
    }

    override fun getValidation(boolean: Boolean) {
        btn_login.setEnable(boolean)
    }


}