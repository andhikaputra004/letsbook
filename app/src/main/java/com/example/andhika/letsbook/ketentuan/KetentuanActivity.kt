package com.example.andhika.letsbook.ketentuan

import android.support.v7.widget.Toolbar
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import kotlinx.android.synthetic.main.activity_ketentuan.*

class KetentuanActivity : BaseActivity() {
    override fun onSetupLayout() {
        setContentView(R.layout.activity_ketentuan)
        setupToolbarTitle(toolbar_layout as Toolbar, R.string.txt_ketentuan,R.drawable.ic_arrow_back_black_24dp)
    }

    override fun onViewReady() {

    }
}