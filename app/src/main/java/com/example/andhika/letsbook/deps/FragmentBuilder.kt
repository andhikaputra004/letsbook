package com.example.andhika.letsbook.deps

import android.annotation.SuppressLint
import com.example.andhika.letsbook.MainActivity
import com.example.andhika.letsbook.fragment.content.ContentFragment
import com.example.andhika.letsbook.fragment.refund.RefundFragment
import com.example.andhika.letsbook.fragment.ticket.TicketFragment
import com.example.andhika.letsbook.fragment.topup.TopUpFragment
import com.example.andhika.letsbook.fragment.transaksi.TransaksiFragment
import com.example.andhika.letsbook.login.LoginActivity
import com.example.andhika.letsbook.register.RegisterActivity
import dagger.Module
import dagger.android.ContributesAndroidInjector


@SuppressLint("unused")
@Module
abstract class FragmentBuilder {

    @FragmentScoped
    @ContributesAndroidInjector
    abstract fun bindContentFragment(): ContentFragment


    @FragmentScoped
    @ContributesAndroidInjector
    abstract fun bindTicketFragment(): TicketFragment


    @FragmentScoped
    @ContributesAndroidInjector
    abstract fun bindTransaksiFragment(): TransaksiFragment


    @FragmentScoped
    @ContributesAndroidInjector
    abstract fun bindTopUpFragment(): TopUpFragment


    @FragmentScoped
    @ContributesAndroidInjector
    abstract fun bindRefundFragment(): RefundFragment
}