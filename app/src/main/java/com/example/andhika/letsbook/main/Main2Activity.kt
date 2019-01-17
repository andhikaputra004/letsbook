package com.example.andhika.letsbook.main

import android.content.Intent
import android.support.design.widget.NavigationView
import android.support.design.widget.Snackbar
import android.support.v4.app.Fragment
import android.support.v4.view.GravityCompat
import android.support.v7.app.ActionBarDrawerToggle
import android.view.Menu
import android.view.MenuItem
import com.example.andhika.letsbook.R
import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.deps.SharedPreferenceHelper
import com.example.andhika.letsbook.fragment.content.ContentFragment
import com.example.andhika.letsbook.fragment.refund.RefundFragment
import com.example.andhika.letsbook.fragment.ticket.TicketFragment
import com.example.andhika.letsbook.fragment.topup.TopUpFragment
import com.example.andhika.letsbook.fragment.transaksi.TransaksiFragment
import com.example.andhika.letsbook.login.LoginActivity
import com.example.andhika.letsbook.utils.Costant.Common.Companion.EMAIL
import com.example.andhika.letsbook.utils.Costant.Common.Companion.NAMA_PELANGGAN
import com.example.andhika.letsbook.utils.buildAlertDialog
import kotlinx.android.synthetic.main.activity_main2.*
import kotlinx.android.synthetic.main.app_bar_main2.*
import kotlinx.android.synthetic.main.nav_header_main2.*
import kotlinx.android.synthetic.main.nav_header_main2.view.*
import javax.inject.Inject

class Main2Activity : BaseActivity(), NavigationView.OnNavigationItemSelectedListener {

    val fragment = ContentFragment()

    @Inject
    lateinit var sharedPreferenceHelper: SharedPreferenceHelper

    override fun onSetupLayout() {
        setContentView(R.layout.activity_main2)
    }

    override fun onViewReady() {
        setSupportActionBar(toolbar)


        val toggle = ActionBarDrawerToggle(
            this, drawer_layout, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close
        )
        loadPreferences()
        drawer_layout.addDrawerListener(toggle)
        toggle.syncState()
        supportFragmentManager.beginTransaction().replace(R.id.cl_content, fragment).commit()

        nav_view.setNavigationItemSelectedListener(this)
    }


    override fun onBackPressed() {
        if (drawer_layout.isDrawerOpen(GravityCompat.START)) {
            drawer_layout.closeDrawer(GravityCompat.START)
        } else {
            super.onBackPressed()
        }
    }

    override fun onCreateOptionsMenu(menu: Menu): Boolean {
        // Inflate the menu; this adds items to the action bar if it is present.
        return true
    }


    override fun onNavigationItemSelected(item: MenuItem): Boolean {
        var fragment: Fragment? = null
        when (item.itemId) {
            R.id.nav_home -> {

                fragment = ContentFragment()
            }
            R.id.nav_ticket -> {
                fragment = TicketFragment()
            }
            R.id.nav_refund -> {
                fragment = RefundFragment()
            }
            R.id.nav_transaksi -> {
                fragment = TransaksiFragment()

            }
            R.id.nav_top_up -> {
                fragment = TopUpFragment()
            }
            else -> {
                buildAlertDialog(
                    getString(R.string.logout),
                    getString(R.string.logout_dialog_detail),
                    getString(R.string.yes_dialog),
                    getString(R.string.no_dialog),
                    positiveAction = {
                        sharedPreferenceHelper.removeSession()
                        startActivity(Intent(this@Main2Activity, LoginActivity::class.java))
                        finish()
                    }).show()
            }

        }
        fragment?.let {
            supportFragmentManager.beginTransaction().replace(R.id.cl_content, fragment).commit()
        }
        drawer_layout.closeDrawer(GravityCompat.START)
        return true
    }


    fun loadPreferences() {
        val navView = nav_view.getHeaderView(0)
        navView.tv_name.text = sharedPreferenceHelper.getString(NAMA_PELANGGAN)
        navView.tv_email.text = sharedPreferenceHelper.getString(EMAIL)
    }

}
