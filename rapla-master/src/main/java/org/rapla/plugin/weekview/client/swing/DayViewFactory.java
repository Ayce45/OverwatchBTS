/*--------------------------------------------------------------------------*
 | Copyright (C) 2014 Christopher Kohlhaas                                  |
 |                                                                          |
 | This program is free software; you can redistribute it and/or modify     |
 | it under the terms of the GNU General Public License as published by the |
 | Free Software Foundation. A copy of the license has been included with   |
 | these distribution in the COPYING file, if not go to www.fsf.org         |
 |                                                                          |
 | As a special exception, you are granted the permissions to link this     |
 | program with every library, which license fulfills the Open Source       |
 | Definition as published by the Open Source Initiative (OSI).             |
 *--------------------------------------------------------------------------*/
package org.rapla.plugin.weekview.client.swing;

import org.rapla.RaplaResources;
import org.rapla.client.EditController;
import org.rapla.client.ReservationController;
import org.rapla.client.dialog.DialogUiFactoryInterface;
import org.rapla.client.dialog.InfoFactory;
import org.rapla.client.extensionpoints.ObjectMenuFactory;
import org.rapla.client.internal.RaplaClipboard;
import org.rapla.client.menu.MenuFactory;
import org.rapla.client.swing.SwingCalendarView;
import org.rapla.client.swing.extensionpoints.SwingViewFactory;
import org.rapla.client.swing.images.RaplaImages;
import org.rapla.components.calendar.DateRenderer;
import org.rapla.components.iolayer.IOInterface;
import org.rapla.entities.domain.AppointmentFormater;
import org.rapla.facade.CalendarModel;
import org.rapla.facade.CalendarSelectionModel;
import org.rapla.facade.client.ClientFacade;
import org.rapla.framework.RaplaException;
import org.rapla.framework.RaplaLocale;
import org.rapla.inject.Extension;
import org.rapla.logger.Logger;
import org.rapla.plugin.weekview.WeekviewPlugin;

import javax.inject.Inject;
import javax.inject.Provider;
import javax.inject.Singleton;
import javax.swing.Icon;
import java.util.Set;

@Singleton
@Extension(provides = SwingViewFactory.class, id = WeekviewPlugin.DAY_VIEW)
public class DayViewFactory implements SwingViewFactory
{
    private final Set<ObjectMenuFactory> objectMenuFactories;
    private final MenuFactory menuFactory;
    private final Provider<DateRenderer> dateRendererProvider;
    private final CalendarSelectionModel calendarSelectionModel;
    private final RaplaClipboard clipboard;
    private final ReservationController reservationController;
    private final InfoFactory infoFactory;
    private final DateRenderer dateRenderer;
    private final DialogUiFactoryInterface dialogUiFactory;
    private final ClientFacade facade;
    private final RaplaResources i18n;
    private final RaplaLocale raplaLocale;
    private final Logger logger;
    private final IOInterface ioInterface;
    private final AppointmentFormater appointmentFormater;
    private final EditController editController;

    @Inject
    public DayViewFactory(ClientFacade facade, RaplaResources i18n, RaplaLocale raplaLocale, Logger logger, Set<ObjectMenuFactory> objectMenuFactories,
            MenuFactory menuFactory, Provider<DateRenderer> dateRendererProvider, CalendarSelectionModel calendarSelectionModel, RaplaClipboard clipboard,
            ReservationController reservationController, InfoFactory infoFactory, DateRenderer dateRenderer,
            DialogUiFactoryInterface dialogUiFactory, IOInterface ioInterface, AppointmentFormater appointmentFormater, EditController editController)
    {
        this.facade = facade;
        this.i18n = i18n;
        this.raplaLocale = raplaLocale;
        this.logger = logger;
        this.objectMenuFactories = objectMenuFactories;
        this.menuFactory = menuFactory;
        this.dateRendererProvider = dateRendererProvider;
        this.calendarSelectionModel = calendarSelectionModel;
        this.clipboard = clipboard;
        this.reservationController = reservationController;
        this.infoFactory = infoFactory;
        this.dateRenderer = dateRenderer;
        this.dialogUiFactory = dialogUiFactory;
        this.ioInterface = ioInterface;
        this.appointmentFormater = appointmentFormater;
        this.editController = editController;
    }
    
    @Override
    public boolean isEnabled()
    {
        return true;
    }

    public SwingCalendarView createSwingView(CalendarModel model, boolean editable, boolean printing) throws RaplaException
    {
        return new SwingDayCalendar(facade, i18n, raplaLocale, logger, model, editable, printing, objectMenuFactories, menuFactory, dateRendererProvider,
                calendarSelectionModel, clipboard, reservationController, infoFactory,  dateRenderer, dialogUiFactory,
                ioInterface, appointmentFormater, editController);
    }

    public String getViewId()
    {
        return WeekviewPlugin.DAY_VIEW;
    }

    public String getName()
    {
        return i18n.getString(WeekviewPlugin.DAY_VIEW);
    }

    Icon icon;

    public Icon getIcon()
    {
        if (icon == null)
        {
            icon = RaplaImages.getIcon("/org/rapla/plugin/weekview/images/day.png");
        }
        return icon;
    }

    public String getMenuSortKey()
    {
        return "A";
    }

}