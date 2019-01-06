package com.example.andhika.letsbook.login

import android.content.Intent
import com.example.andhika.letsbook.MainActivity
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.main.Main2Activity
import com.example.andhika.letsbook.model.LoginReponse
import com.example.andhika.letsbook.model.LoginRequest
import com.example.andhika.letsbook.utils.Costant.Common.Companion.ID_PELANGGAN
import com.example.andhika.letsbook.utils.Costant.Common.Companion.NAMA_PELANGGAN
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

        btn_login.setOnClickListener {
            presenter.goToLogin(LoginRequest(et_username.text.toString(),et_password.text.toString()))
        }
    }

    override fun getLoginReponse(response: LoginReponse) {
        response.datapelanggan?.idPelanggan?.let { sharedPreferenceHelper.setString(ID_PELANGGAN, it) }
        response.datapelanggan?.namaPelanggan?.let { sharedPreferenceHelper.setString(NAMA_PELANGGAN,it) }
        startActivity(Intent(this@LoginActivity,Main2Activity::class.java))
    }
}